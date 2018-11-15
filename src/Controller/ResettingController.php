<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 18/11/2018
 * Time: 19:56
 */

namespace App\Controller;


use App\Entity\AuthUser;
use App\Entity\Staff;
use App\Entity\Student;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResettingController extends \FOS\UserBundle\Controller\ResettingController
{
	final public function sendEmailAction(Request $request): Response
	{
		$username = $request->request->get('username');

		$manager = $this->getDoctrine()->getManager();

		$repository_staff = $manager->getRepository(Staff::class);
		$repository_student = $manager->getRepository(Student::class);

		$student = $repository_student->findOneBy(['studentNo'=>$username]);

		if (!$student){
			$staff = $repository_staff->findOneBy(['staffNo' => $username]);
			if(!$staff){
				return $this->render('@FOSUser/Resetting/request.html.twig', array(
					'error'=>'Wrong ID number'
				));
			}

			if (!$staff->getEmail()) {
				return $this->render('@FOSUser/Resetting/request.html.twig', array(
					'error'=>'You did not register an email. Consult the administrator'
				));
			}

			$isRegistered = $manager->getRepository(AuthUser::class)->findOneBy(['email'=>$staff->getEmail()]);
			if (!$isRegistered) {
				return $this->render('@FOSUser/Resetting/request.html.twig', array(
					'error'=>'You account has not been activated. First register it.'
				));
			}

			$request->request->set('username', $staff->getEmail());
		} else {
			return $this->render('@FOSUser/Resetting/request.html.twig', array(
				'error'=>'For resetting your password `'. $student->getFirstName() .'`. Consult the administration'
			));
		}

		return parent::sendEmailAction($request);
	}


}
