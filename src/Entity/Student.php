<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 18/11/2018
 * Time: 12:41
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Entity
 */
class Student extends MBaseUser
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="student_no", type="string", nullable=false, unique=true)
	 */
	private $studentNo;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="class", type="string", length=45, nullable=false)
	 */
	private $class;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="religion", type="string", length=45, nullable=true)
	 */
	private $religion;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="parent_first_name", type="string", length=45, nullable=true)
	 */
	private $parentFirstName;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="parent_last_name", type="string", length=45, nullable=true)
	 */
	private $parentLastName;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="parent_email", type="string", length=45, nullable=true)
	 */
	private $parentEmail;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="parent_contact", type="string", length=45, nullable=true)
	 */
	private $parentContact;

	/**
	 * Get studentNo
	 *
	 * @return string
	 */
	public function getStudentNo(): string
	{
		return $this->studentNo;
	}

	/**
	 * Set studentNo
	 *
	 * @param string $studentNo
	 *
	 * @return Student
	 */
	public function setStudentNo(string $studentNo): Student
	{
		$this->studentNo = $studentNo;

		return $this;
	}

	/**
	 * Get class
	 *
	 * @return string
	 */
	public function getClass(): ?string
	{
		return $this->class;
	}

	/**
	 * Set class
	 *
	 * @param string $class
	 *
	 * @return Student
	 */
	public function setClass(string $class): Student
	{
		$this->class = $class;

		return $this;
	}

	/**
	 * Get religion
	 *
	 * @return string
	 */
	public function getReligion(): ?string
	{
		return $this->religion;
	}

	/**
	 * Set religion
	 *
	 * @param string $religion
	 *
	 * @return Student
	 */
	public function setReligion(string $religion): Student
	{
		$this->religion = $religion;

		return $this;
	}

	/**
	 * Get parentFirstName
	 *
	 * @return string
	 */
	public function getParentFirstName(): ?string
	{
		return $this->parentFirstName;
	}

	/**
	 * Set parentFirstName
	 *
	 * @param string $parentFirstName
	 *
	 * @return Student
	 */
	public function setParentFirstName(string $parentFirstName): Student
	{
		$this->parentFirstName = $parentFirstName;

		return $this;
	}

	/**
	 * Get parentLastName
	 *
	 * @return string
	 */
	public function getParentLastName(): ?string
	{
		return $this->parentLastName;
	}

	/**
	 * Set parentLastName
	 *
	 * @param string $parentLastName
	 *
	 * @return Student
	 */
	public function setParentLastName(string $parentLastName): Student
	{
		$this->parentLastName = $parentLastName;

		return $this;
	}

	/**
	 * Get parentEmail
	 *
	 * @return string
	 */
	public function getParentEmail(): ?string
	{
		return $this->parentEmail;
	}

	/**
	 * Set parentEmail
	 *
	 * @param string $parentEmail
	 *
	 * @return Student
	 */
	public function setParentEmail(string $parentEmail): Student
	{
		$this->parentEmail = $parentEmail;

		return $this;
	}

	/**
	 * Get parentContact
	 *
	 * @return string
	 */
	public function getParentContact(): ?string
	{
		return $this->parentContact;
	}

	/**
	 * Set parentContact
	 *
	 * @param string $parentContact
	 *
	 * @return Student
	 */
	public function setParentContact(string $parentContact): Student
	{
		$this->parentContact = $parentContact;

		return $this;
	}

	public function serialize(): string
	{
		return $this->serializer->serialize($this);
	}

	/** @noinspection MissingReturnTypeInspection */
	public function unserialize(/** @noinspection MissingParameterTypeDeclarationInspection */ $serialized)
	{
		$this->serializer->deserialize($serialized, __CLASS__);
	}
}
