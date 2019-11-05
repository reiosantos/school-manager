<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * School
 *
 * @ORM\Table(name="schools")
 * @ORM\Entity
 */
class School
{
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 */
	private $name;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="moto", type="string", length=255, nullable=true)
	 */
	private $moto;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="mission", type="string", length=255, nullable=true)
	 */
	private $mission;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="vission", type="string", length=255, nullable=true)
	 */
	private $vission;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="urlcomponent", type="string", length=45, nullable=false)
	 */
	private $urlComponent;

	/**
	 * @var integer|null
	 *
	 * @ORM\Column(name="ID", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @ORM\OneToMany(targetEntity="App\Entity\SettingsValues", mappedBy="school")
	 */
	private $settings;

	public function __construct()
	{
		$this->settings = new ArrayCollection();
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

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getMoto(): ?string
	{
		return $this->moto;
	}

	public function setMoto(?string $moto): self
	{
		$this->moto = $moto;

		return $this;
	}

	public function getMission(): ?string
	{
		return $this->mission;
	}

	public function setMission(?string $mission): self
	{
		$this->mission = $mission;

		return $this;
	}

	public function getVission(): ?string
	{
		return $this->vission;
	}

	public function setVission(?string $vission): self
	{
		$this->vission = $vission;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getUrlComponent(): ?string
	{
		return $this->urlComponent;
	}

	public function setUrlComponent(string $urlComponent): self
	{
		$this->urlComponent = $urlComponent;

		return $this;
	}

	/**
	 * @return Collection|SettingsValues[]
	 */
	public function getSettings(): Collection
	{
		return $this->settings;
	}

	public function addSetting(SettingsValues $setting): self
	{
		if (!$this->settings->contains($setting)) {
			$this->settings[] = $setting;
			$setting->setSchool($this);
		}

		return $this;
	}

	public function removeSetting(SettingsValues $setting): self
	{
		if ($this->settings->contains($setting)) {
			$this->settings->removeElement($setting);
			// set the owning side to null (unless already changed)
			if ($setting->getSchool() === $this) {
				$setting->setSchool(null);
			}
		}

		return $this;
	}
}
