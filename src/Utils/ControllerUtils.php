<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 16/12/2018
 * Time: 21:52
 */

namespace App\Utils;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ControllerUtils extends Controller
{
	/**
	 * @param Request $request
	 * @param $key
	 * @param $message
	 */
	final public static function addToSession(Request $request, $key,  $message): void
	{
		if ($request->getSession()){
			$request->getSession()->set($key, $message);
		}
	}

	/**
	 * @param Controller $object
	 * @param Request $request
	 */
	final public static function addFlashMessage(Controller $object, Request $request): void
	{
		if ($request->getSession()){

			if ($request->getSession()->get(Constants::KEY_ACTION_SUCCESS)) {
				$object->addFlash(Constants::KEY_ACTION_SUCCESS,
					$request->getSession()->get(Constants::KEY_ACTION_SUCCESS));
			}

			if ($request->getSession()->get(Constants::KEY_ACTION_ERROR)) {
				$object->addFlash(Constants::KEY_ACTION_ERROR,
					$request->getSession()->get(Constants::KEY_ACTION_ERROR));
			}

			$request->getSession()->remove(Constants::KEY_ACTION_ERROR);
			$request->getSession()->remove(Constants::KEY_ACTION_SUCCESS);
		}
	}

}
