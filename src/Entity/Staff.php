<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teacher
 *
 * @ORM\Entity(repositoryClass="App\Repository\StaffRepository")
 *
 * @ORM\Entity
 */
class Staff extends MBaseUser
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="staff_no", type="string", nullable=false, unique=true)
	 */
	private $staffNo;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="email", type="string", length=45, nullable=true)
	 */
	private $email;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="contact", type="string", length=45, nullable=true)
	 */
	private $contact;

	/**
	 * Get staffNo
	 *
	 * @return string
	 */
	public function getStaffNo(): string
	{
		return $this->staffNo;
	}

	/**
	 * Set staffNo
	 *
	 * @param string $staffNo
	 *
	 * @return Staff
	 */
	public function setStaffNo(string $staffNo): Staff
	{
		$this->staffNo = $staffNo;
		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail(): ?string
	{
		return $this->email;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 *
	 * @return Staff
	 */
	public function setEmail(string $email): Staff
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get contact
	 *
	 * @return string
	 */
	public function getContact(): ?string
	{
		return $this->contact;
	}

	/**
	 * Set contact
	 *
	 * @param string $contact
	 *
	 * @return Staff
	 */
	public function setContact(string $contact): Staff
	{
		$this->contact = $contact;

		return $this;
	}

	public function serialize(): string
	{
		return $this->serializer->serialize($this);
	}

	public function unserialize(/** @noinspection MissingParameterTypeDeclarationInspection */ $serialized): void
	{
		$this->serializer->deserialize($serialized, __CLASS__);
	}
}
