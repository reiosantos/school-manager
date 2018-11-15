<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classes
 *
 * @ORM\Table(name="Classes")
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
     * Set className
     *
     * @param string $className
     *
     * @return Classes
     */
    final public function setClassName($className): Classes
	{
        $this->className = $className;

        return $this;
    }

    /**
     * Get className
     *
     * @return string
     */
    final public function getClassName(): string
	{
        return $this->className;
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
