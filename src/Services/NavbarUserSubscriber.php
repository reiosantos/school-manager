<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 19/11/2018
 * Time: 19:31
 */

namespace App\Services;

use App\Entity\AuthUser;
use KevinPapst\AdminLTEBundle\Event\ShowUserEvent;
use KevinPapst\AdminLTEBundle\Event\ThemeEvents;
use KevinPapst\AdminLTEBundle\Model\UserModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class NavbarUserSubscriber
 * @package App\Services
 */
class NavbarUserSubscriber implements EventSubscriberInterface
{
	protected $security;

	public function __construct(Security $security)
	{
		$this->security = $security;
	}

	final public static function getSubscribedEvents(): array
	{
		return [
			ThemeEvents::THEME_NAVBAR_USER => ['onShowUser', 100],
			ThemeEvents::THEME_SIDEBAR_USER => ['onShowUser', 100],
		];
	}

	final public function onShowUser(ShowUserEvent $event): void
	{
		if (null === $this->security->getUser()) {
			return;
		}

		/* @var $myUser AuthUser */
		$myUser = $this->security->getUser();

		$user = new UserModel();
		$user
			->setId($myUser->getId())
			->setName($myUser->getUsername())
			->setUsername($myUser->getUsername())
			->setIsOnline(true)
			->setTitle('User')
		;

		$event->setUser($user);
	}
}
