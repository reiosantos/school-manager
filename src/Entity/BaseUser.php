<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 18/11/2018
 * Time: 12:35
 */

namespace App\Entity;

use App\Utils\CustomSerializer;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Serializable;

abstract class BaseUser extends Roles implements Serializable
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
	final public function getId(): int
	{
		return $this->id;
	}

	/**
	 * Set firstName
	 *
	 * @param string $firstName
	 *
	 * @return BaseUser
	 */
	final public function setFirstName(string $firstName): BaseUser
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * Get firstName
	 *
	 * @return string
	 */
	final public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	/**
	 * Set lastName
	 *
	 * @param string $lastName
	 *
	 * @return BaseUser
	 */
	final public function setLastName(string $lastName): BaseUser
	{
		$this->lastName = $lastName;

		return $this;
	}

	/**
	 * Get lastName
	 *
	 * @return string
	 */
	final public function getLastName(): ?string
	{
		return $this->lastName;
	}

	/**
	 * Set address
	 *
	 * @param string $address
	 *
	 * @return BaseUser
	 */
	final public function setAddress(string $address): BaseUser
	{
		$this->address = $address;

		return $this;
	}

	/**
	 * Get address
	 *
	 * @return string
	 */
	final public function getAddress(): ?string
	{
		return $this->address;
	}

	/**
	 * Set nationality
	 *
	 * @param string $nationality
	 *
	 * @return BaseUser
	 */
	final public function setNationality(string $nationality): BaseUser
	{
		$this->nationality = $nationality;

		return $this;
	}

	/**
	 * Get nationality
	 *
	 * @return string
	 */
	final public function getNationality(): ?string
	{
		return $this->nationality;
	}

	/**
	 * Set joinDate
	 *
	 * @param DateTime $joinDate
	 *
	 * @return BaseUser
	 */
	final public function setJoinDate(DateTime $joinDate): BaseUser
	{
		$this->joinDate = $joinDate;

		return $this;
	}

	/**
	 * Get joinDate
	 *
	 * @return DateTime
	 */
	final public function getJoinDate(): ?DateTime
	{
		return $this->joinDate;
	}

	/**
	 * Set imageName
	 *
	 * @param string $imageName
	 *
	 * @return BaseUser
	 */
	final public function setImageName($imageName): BaseUser
	{
		$this->imageName = $imageName;

		return $this;
	}

	/**
	 * Get imageName
	 *
	 * @return string
	 */
	final public function getImageName(): ?string
	{
		return $this->imageName;
	}
}
