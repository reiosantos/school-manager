<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Settings
 *
 * @ORM\Table(name="settings")
 * @ORM\Entity
 */
class Settings
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="name", type="string", length=255, nullable=true)
	 */
	private $name;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="description", type="string", length=255, nullable=true)
	 */
	private $description;

	/**
	 * @var integer|null
	 *
	 * @ORM\Column(name="ID", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\SettingsValues", mappedBy="setting")
	 */
	private $settingsValues;

	public function __construct()
	{
		$this->settingsValues = new ArrayCollection();
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

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(?string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(?string $description): self
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * @return Collection|SettingsValues[]
	 */
	public function getSettingsValues(): Collection
	{
		return $this->settingsValues;
	}

	public function addSettingsValue(SettingsValues $settingsValue): self
	{
		if (!$this->settingsValues->contains($settingsValue)) {
			$this->settingsValues[] = $settingsValue;
			$settingsValue->setSetting($this);
		}

		return $this;
	}

	public function removeSettingsValue(SettingsValues $settingsValue): self
	{
		if ($this->settingsValues->contains($settingsValue)) {
			$this->settingsValues->removeElement($settingsValue);
			// set the owning side to null (unless already changed)
			if ($settingsValue->getSetting() === $this) {
				$settingsValue->setSetting(null);
			}
		}

		return $this;
	}
}
