<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthUserRepository")
 */
class AuthUser extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="user_no", type="string", unique=true, nullable=false)
	 */
	protected $userNo;

	/**
	 * @return string
	 */
	final public function getUserNo(): ?string
	{
		return $this->userNo;
	}

	/**
	 * @param int $userNo
	 * @return AuthUser
	 */
	final public function setUserNo(int $userNo): AuthUser
	{
		$this->userNo = $userNo;
		return $this;
	}
}
