<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classes
 *
 * @ORM\Table(name="classes")
 * @ORM\Entity
 */
class Classes
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="class_name", type="string", length=45, nullable=true)
	 */
	private $className;

	/**
	 * @var integer|null
	 *
	 * @ORM\Column(name="ID", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * Get className
	 *
	 * @return string
	 */
	public function getClassName(): string
	{
		return $this->className;
	}

	/**
	 * Set className
	 *
	 * @param string $className
	 *
	 * @return Classes
	 */
	public function setClassName(string $className): Classes
	{
		$this->className = $className;

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
}
