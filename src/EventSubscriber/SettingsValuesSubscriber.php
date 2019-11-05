<?php /** @noinspection ALL */

/*echo highlight_string("<?php\n\$data =\n" . var_export($this->container->getParameter('vision'), true) . "\n?>");*/

namespace App\EventSubscriber;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\FetchMode;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class SettingsValuesSubscriber implements EventSubscriberInterface
{
	/**
	 * @var ObjectRepository
	 */
	private $db;
	private $logger;
	private $cache;

	public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
	{

		$this->db = $entityManager->getConnection();
		$this->logger = $logger;
		$this->cache = new FilesystemAdapter('school-ms', 0, 'cache');
	}

	/**
	 * Returns an array of event names this subscriber wants to listen to.
	 *
	 * The array keys are event names and the value can be:
	 *
	 *  * The method name to call (priority defaults to 0)
	 *  * An array composed of the method name to call and the priority
	 *  * An array of arrays composed of the method names to call and respective
	 *    priorities, or 0 if unset
	 *
	 * For instance:
	 *
	 *  * ['eventName' => 'methodName']
	 *  * ['eventName' => ['methodName', $priority]]
	 *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
	 *
	 * @return array The event names to listen to
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			KernelEvents::REQUEST => [
				['get', 0]
			]
		];
	}

	/**
	 * Sets a setting value.
	 * If the setting doesn't exists, it creates it. Otherwise, it replaces the db value
	 * @param string $settingId
	 * @param string $schoolId
	 * @param string $value
	 */
	public function set(string $settingId, string $schoolId, string $value): void
	{
		try {
			$this->db
				->prepare('INSERT INTO settings_values (setting_id, school_id, value) VALUES (?,?,?) ON DUPLICATE KEY UPDATE value=?;')
				->execute([$settingId, $schoolId, $value, $value]);
		} catch (DBALException $e) {
			$this->logger->error($e->getMessage());
		}
	}

	/**
	 * @param Request $request
	 * @param string $name
	 * @param bool $all
	 * @return array|string|null
	 */
	public function getValue(Request $request, string $name, bool $all)
	{
		$urlComponent = $request->query->get('venue', null);
		$settings = $this->get(null, $urlComponent);

		if ($all === true) {
			return $settings;
		}
		return $settings[$name];
	}

	/**
	 * Gets a setting value.
	 * If the setting doesn't exist, returns the default value specified as second param
	 * @param RequestEvent|null $event
	 * @param string $urlComponent
	 * @return array
	 */
	public function get(?RequestEvent $event, ?string $urlComponent): array
	{
		if (
			(!$event && !$urlComponent) ||
			($event && $event->getRequestType() !== HttpKernelInterface::MASTER_REQUEST)
		) {
			return [];
		}
		try {
			if ($event !== null) {
				$urlComponent = $event->getRequest()->get('venue', '');
			}
			$item = $this->cache->getItem($urlComponent);
			if ($item->isHit()) {
				return $this->getSettings($urlComponent); //$item->get();
			}

			$result = $this->getSettings($urlComponent);
			$item->set($result);
			$item->expiresAfter(60 * 60 * 2); // 2 hours to expire
			$this->cache->save($item);
			return $item->get();
		} catch (InvalidArgumentException $e) {
			$this->logger->error($e->getMessage());
			return $this->getSettings($urlComponent);
		}
	}

	/**
	 * @param string $urlComponent
	 * @return array|mixed[]
	 */
	private function getSettings(string $urlComponent): ?array
	{
		try {
			$school = $this->db->prepare('SELECT ID, name as school_name, moto, mission, vission, urlcomponent FROM schools WHERE urlcomponent=:urlComponent;');
			$school->execute(['urlComponent' => $urlComponent]);
			$result = $school->fetch();

			if (!$result) {
				return [];
			}

			$stmt = $this->db->prepare('SELECT settings.name,  a.value FROM settings_values as a LEFT JOIN settings ON a.setting_id=settings.ID WHERE a.school_id=:schoolId;');
			$stmt->execute(['schoolId' => $result['ID']]);
			$data = $stmt->fetchAll(FetchMode::ASSOCIATIVE);

			foreach ($result as $key => $value) {
				if ($key !== 'ID') {
					$data[] = ['name' => $key, 'value' => $value];
				}
			}
			$tmp = [];
			foreach ($data as $value) {
				$tmp[$value['name']] = $value['value'];
			}
			return $tmp;
		} catch (DBALException $e) {
			$this->logger->error($e->getMessage());

		} catch (\TypeError $e) {
			$this->logger->error($e->getMessage());
		}
		return [];
	}
}
