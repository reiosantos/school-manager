<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Positions
 *
 * @ORM\Table(name="Positions")
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
     * Set position
     *
     * @param string $position
     *
     * @return Positions
     */
    final public function setPosition($position): Positions
	{
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    final public function getPosition(): string
	{
        return $this->position;
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
}
