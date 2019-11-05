<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthUserRepository")
 */
class AuthUser extends User
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
	public function getUserNo(): ?string
	{
		return $this->userNo;
	}

	/**
	 * @param int $userNo
	 * @return AuthUser
	 */
	public function setUserNo(int $userNo): AuthUser
	{
		$this->userNo = $userNo;
		return $this;
	}

	public function getId(): ?int
	{
		return $this->id;
	}
}
