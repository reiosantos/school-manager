<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 18/11/2018
 * Time: 20:15
 */

namespace App\Repository;

use App\Entity\Staff;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StaffRepository extends ServiceEntityRepository
{

	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, Staff::class);
	}
}
