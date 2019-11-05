<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 18/11/2018
 * Time: 12:35
 */

namespace App\Entity;

use App\Utils\CustomSerializer;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Serializable;

abstract class MBaseUser extends Roles implements Serializable
{
	/**
	 * @var object $serializer
	 */
	protected $serializer;

	/**
	 * @var integer|null
	 *
	 * @ORM\Column(name="ID", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="first_name", type="string", length=45, nullable=true)
	 */
	protected $firstName;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
	 */
	protected $lastName;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="address", type="string", length=45, nullable=true)
	 */
	protected $address;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="nationality", type="string", length=45, nullable=true)
	 */
	protected $nationality;

	/**
	 * @var DateTime|null
	 *
	 * @ORM\Column(name="join_date", type="datetime", nullable=true)
	 */
	protected $joinDate;

	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="image_name", type="string", length=255, nullable=true)
	 */
	protected $imageName;

	public function __construct()
	{
		$this->serializer = new CustomSerializer();
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
	 * Get firstName
	 *
	 * @return string
	 */
	public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	/**
	 * Set firstName
	 *
	 * @param string $firstName
	 *
	 * @return MBaseUser
	 */
	public function setFirstName(string $firstName): MBaseUser
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * Get lastName
	 *
	 * @return string
	 */
	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	/**
	 * Set lastName
	 *
	 * @param string $lastName
	 *
	 * @return MBaseUser
	 */
	public function setLastName(string $lastName): MBaseUser
	{
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * Get address
	 *
	 * @return string
	 */
	public function getAddress(): ?string
	{
		return $this->address;
	}

	/**
	 * Set address
	 *
	 * @param string $address
	 *
	 * @return MBaseUser
	 */
	public function setAddress(string $address): MBaseUser
	{
		$this->address = $address;

		return $this;
	}

	/**
	 * Get nationality
	 *
	 * @return string
	 */
	public function getNationality(): ?string
	{
		return $this->nationality;
	}

	/**
	 * Set nationality
	 *
	 * @param string $nationality
	 *
	 * @return MBaseUser
	 */
	public function setNationality(string $nationality): MBaseUser
	{
		$this->nationality = $nationality;

		return $this;
	}

	/**
	 * Get joinDate
	 *
	 * @return DateTime
	 */
	public function getJoinDate(): ?DateTime
	{
		return $this->joinDate;
	}

	/**
	 * Set joinDate
	 *
	 * @param DateTime $joinDate
	 *
	 * @return MBaseUser
	 */
	public function setJoinDate(DateTime $joinDate): MBaseUser
	{
		$this->joinDate = $joinDate;

		return $this;
	}

	/**
	 * Get imageName
	 *
	 * @return string
	 */
	public function getImageName(): ?string
	{
		return $this->imageName;
	}

	/**
	 * Set imageName
	 *
	 * @param string $imageName
	 *
	 * @return MBaseUser
	 */
	public function setImageName(string $imageName): MBaseUser
	{
		$this->imageName = $imageName;

		return $this;
	}
}
