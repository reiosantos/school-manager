<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 18/11/2018
 * Time: 18:05
 */

namespace App\Utils;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CustomSerializer
{
	private $serializer;

	public function __construct()
	{
		$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new ObjectNormalizer());
		$this->serializer = new Serializer($normalizers, $encoders);
	}

	final public function serialize($object)  {
		return $this->serializer->serialize($object, 'json');
	}

	final public function deserialize($data, $class)  {
		return $this->serializer->deserialize($data, $class, 'json', [
			'allow_extra_attributes' => true,
		]);
	}
}
