<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 18/11/2018
 * Time: 12:55
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Roles
{
	private const ROLE_DEFAULT = 'ROLE_USER';

	/**
	 * @var array|null
	 *
	 * @ORM\Column(type="array")
	 */
	protected $roles = [];

	/**
	 * {@inheritdoc}
	 */
	final public function addRole($role)
	{
		$role = strtoupper($role);
		if ($role === static::ROLE_DEFAULT) {
			return $this;
		}

		if (!\in_array($role, $this->roles, true)) {
			$this->roles[] = $role;
		}
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	final public function setRoles(array $roles)
	{
		$this->roles = array();

		foreach ($roles as $role) {
			$this->addRole($role);
		}
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	final public function getRoles(): array
	{
		return array_unique($this->roles);
	}

	/**
	 * {@inheritdoc}
	 */
	final public function removeRole($role)
	{
		if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
			unset($this->roles[$key]);
			$this->roles = array_values($this->roles);
		}
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	final public function hasRole($role): bool
	{
		return \in_array(strtoupper($role), $this->getRoles(), true);
	}
}
