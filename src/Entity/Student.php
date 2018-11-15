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
class Student extends BaseUser
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
	 * Set studentNo
	 *
	 * @param string $studentNo
	 *
	 * @return Student
	 */
	final public function setStudentNo($studentNo): Student
	{
		$this->studentNo = $studentNo;

		return $this;
	}

	/**
	 * Get studentNo
	 *
	 * @return string
	 */
	final public function getStudentNo(): string
	{
		return $this->studentNo;
	}

	/**
	 * Set class
	 *
	 * @param string $class
	 *
	 * @return Student
	 */
	final public function setClass($class): Student
	{
		$this->class = $class;

		return $this;
	}

	/**
	 * Get class
	 *
	 * @return string
	 */
	final public function getClass(): ?string
	{
		return $this->class;
	}

	/**
	 * Set religion
	 *
	 * @param string $religion
	 *
	 * @return Student
	 */
	final public function setReligion($religion): Student
	{
		$this->religion = $religion;

		return $this;
	}

	/**
	 * Get religion
	 *
	 * @return string
	 */
	final public function getReligion(): ?string
	{
		return $this->religion;
	}

	/**
	 * Set parentFirstName
	 *
	 * @param string $parentFirstName
	 *
	 * @return Student
	 */
	final public function setParentFirstName($parentFirstName): Student
	{
		$this->parentFirstName = $parentFirstName;

		return $this;
	}

	/**
	 * Get parentFirstName
	 *
	 * @return string
	 */
	final public function getParentFirstName(): ?string
	{
		return $this->parentFirstName;
	}

	/**
	 * Set parentLastName
	 *
	 * @param string $parentLastName
	 *
	 * @return Student
	 */
	final public function setParentLastName($parentLastName): Student
	{
		$this->parentLastName = $parentLastName;

		return $this;
	}

	/**
	 * Get parentLastName
	 *
	 * @return string
	 */
	final public function getParentLastName(): ?string
	{
		return $this->parentLastName;
	}

	/**
	 * Set parentEmail
	 *
	 * @param string $parentEmail
	 *
	 * @return Student
	 */
	final public function setParentEmail($parentEmail): Student
	{
		$this->parentEmail = $parentEmail;

		return $this;
	}

	/**
	 * Get parentEmail
	 *
	 * @return string
	 */
	final public function getParentEmail(): ?string
	{
		return $this->parentEmail;
	}

	/**
	 * Set parentContact
	 *
	 * @param string $parentContact
	 *
	 * @return Student
	 */
	final public function setParentContact($parentContact): Student
	{
		$this->parentContact = $parentContact;

		return $this;
	}

	/**
	 * Get parentContact
	 *
	 * @return string
	 */
	final public function getParentContact(): ?string
	{
		return $this->parentContact;
	}

	final public function serialize(): string
	{
		return $this->serializer->serialize($this);
	}

	final public function unserialize($serialized)
	{
		$this->serializer->deserialize($serialized, __CLASS__);
	}
}
