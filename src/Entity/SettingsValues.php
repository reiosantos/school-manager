<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Settings
 *
 * @ORM\Entity
 */
class SettingsValues
{
	/**
	 * @var Settings|null
	 *
	 * @ORM\ManyToOne(targetEntity="App\Entity\Settings", cascade={"remove"}, inversedBy="settingsValues")
	 */
	private $setting;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="value", type="string", length=255, nullable=true)
	 */
	private $value;

	/**
	 * @var School|null
	 * @ORM\ManyToOne(targetEntity="App\Entity\School", cascade={"remove"}, inversedBy="settings")
	 */
	private $school;

	/**
	 * @var integer|null
	 *
	 * @ORM\Column(name="ID", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId(): int
	{
		return $this->id;
	}

	public function getName(): ?string
	{
		return $this->setting->getName();
	}

	public function getValue(): ?string
	{
		return $this->value;
	}

	public function setValue(?string $value): self
	{
		$this->value = $value;

		return $this;
	}

	public function getSchool(): ?string
	{
		return $this->school;
	}

	public function setSchool(?string $school): self
	{
		$this->school = $school;

		return $this;
	}

	public function getSetting(): ?Settings
	{
		return $this->setting;
	}

	public function setSetting(?Settings $setting): self
	{
		$this->setting = $setting;

		return $this;
	}
}
