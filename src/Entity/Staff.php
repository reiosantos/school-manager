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
class Staff extends BaseUser
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
     * Set staffNo
     *
     * @param string $staffNo
     *
     * @return Staff
     */
    final public function setStaffNo($staffNo): Staff
	{
        $this->staffNo = $staffNo;
        return $this;
    }

    /**
     * Get staffNo
     *
     * @return string
     */
    final public function getStaffNo(): string
	{
        return $this->staffNo;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Staff
     */
    final public function setEmail(string $email): Staff
	{
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    final public function getEmail(): ?string
	{
        return $this->email;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Staff
     */
    final public function setContact(string $contact): Staff
	{
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    final public function getContact(): ?string
	{
        return $this->contact;
    }

	final public function serialize(): string
	{
		return $this->serializer->serialize($this);
	}

	final public function unserialize($serialized): void
	{
		$this->serializer->deserialize($serialized, __CLASS__);
	}
}
