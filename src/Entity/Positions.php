<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Positions
 *
 * @ORM\Table(name="positions")
 * @ORM\Entity
 */
class Positions
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="position", type="string", length=45, nullable=true)
	 */
	private $position;

	/**
	 * @var integer|null
	 *
	 * @ORM\Column(name="ID", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * Get position
	 *
	 * @return string
	 */
	public function getPosition(): string
	{
		return $this->position;
	}

	/**
	 * Set position
	 *
	 * @param string $position
	 *
	 * @return Positions
	 */
	public function setPosition(string $position): Positions
	{
		$this->position = $position;

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
