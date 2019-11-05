<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subject
 *
 * @ORM\Table(name="subjects", uniqueConstraints={@ORM\UniqueConstraint(name="subject_no_UNIQUE",
 *     columns={"subject_no"})})
 * @ORM\Entity
 */
class Subject
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="subject_no", type="string", nullable=false, unique=true)
	 *
	 */
	private $subjectNo;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="subject_name", type="string", length=255, nullable=true)
	 */
	private $subjectName;

	/**
	 * @var integer|null
	 *
	 * @ORM\Column(name="ID", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="subject_category", type="string", length=255, nullable=true)
	 *
	 */
	private $subjectCategory;

	/**
	 * Get subjectNo
	 *
	 * @return null|string
	 */
	public function getSubjectNo(): ?string
	{
		return $this->subjectNo;
	}

	/**
	 * Set subjectNo
	 *
	 * @param integer $subjectNo
	 *
	 * @return Subject
	 */
	public function setSubjectNo(int $subjectNo): Subject
	{
		$this->subjectNo = $subjectNo;

		return $this;
	}

	/**
	 * Get subjectName
	 *
	 * @return string
	 */
	public function getSubjectName(): ?string
	{
		return $this->subjectName;
	}

	/**
	 * Set subjectName
	 *
	 * @param string $subjectName
	 *
	 * @return Subject
	 */
	public function setSubjectName(string $subjectName): Subject
	{
		$this->subjectName = $subjectName;

		return $this;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * Get subjectCategory
	 *
	 * @return string
	 */
	public function getSubjectCategory(): ?string
	{
		return $this->subjectCategory;
	}

	/**
	 * Set subjectCategory
	 *
	 * @param string $subjectCategory
	 *
	 * @return Subject
	 */
	public function setSubjectCategory(string $subjectCategory): Subject
	{
		$this->subjectCategory = $subjectCategory;

		return $this;
	}
}
