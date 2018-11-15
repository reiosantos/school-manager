<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subject
 *
 * @ORM\Table(name="Subject", uniqueConstraints={@ORM\UniqueConstraint(name="subject_no_UNIQUE", columns={"subject_no"})})
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
     *@ORM\Column(name="subject_category", type="string", length=255, nullable=true)
     *
     */
    private $subjectCategory;



    /**
     * Set subjectNo
     *
     * @param integer $subjectNo
     *
     * @return Subject
     */
    final public function setSubjectNo($subjectNo): Subject
	{
        $this->subjectNo = $subjectNo;

        return $this;
    }

	/**
	 * Get subjectNo
	 *
	 * @return null|string
	 */
    final public function getSubjectNo(): ?string
	{
        return $this->subjectNo;
    }

    /**
     * Set subjectName
     *
     * @param string $subjectName
     *
     * @return Subject
     */
    final public function setSubjectName($subjectName): Subject
	{
        $this->subjectName = $subjectName;

        return $this;
    }

    /**
     * Get subjectName
     *
     * @return string
     */
    final public function getSubjectName(): ?string
	{
        return $this->subjectName;
    }

    /**
     * Get id
     *
     * @return integer
     */
    final public function getId(): int
	{
        return $this->id;
    }


    /**
     * Set subjectCategory
     *
     * @param string $subjectCategory
     *
     * @return Subject
     */
    final public function setSubjectCategory($subjectCategory): Subject
	{
        $this->subjectCategory = $subjectCategory;

        return $this;
    }

    /**
     * Get subjectCategory
     *
     * @return string
     */
    final public function getSubjectCategory(): ?string
	{
        return $this->subjectCategory;
    }
}
