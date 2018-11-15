<?php
/**
 * Created by PhpStorm.
 * User: reiosantos
 * Date: 6/22/17
 * Time: 5:07 PM
 */

namespace App\Controller;

use App\Entity\Classes;
use App\Entity\Positions;
use App\Entity\Subject;
use App\Form\SubjectType;
use App\Utils\Constants;
use App\Utils\ControllerUtils;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use UnexpectedValueException;

class InitialSetupController extends Controller
{

	/**
	 * @param Request $request
	 * @return Response
	 *
	 * @Route(name="admin_setup", path="/admin/setup/", methods={"GET", "POST"})
	 */
	final public function indexAction(Request $request): Response
	{

		$objectManager = $this->getDoctrine()->getManager();

		$form = $this->createForm(SubjectType::class);
		$form->handleRequest($request);
		ControllerUtils::addFlashMessage($this, $request);
		$message = null;

		if ($form->isSubmitted() && $request->isMethod('POST') && $form->isValid()) {
			try {
				$data = $form->getData();
				$data->setSubjectNo(str_replace(' ', '_', $data->getSubjectNo()));

				$objectManager->persist($data);
				$objectManager->flush();
				$message = Constants::SUBJECT_ADDED_SUCCESSFULLY;
				$this->addFlash(Constants::KEY_ACTION_SUCCESS, $message);

				$form = $this->createForm(SubjectType::class);

			} catch (UniqueConstraintViolationException $e) {
				$this->addFlash(Constants::KEY_ACTION_ERROR, Constants::SUBJECT_ALREADY_EXISTS);
			}
		}

		$classRepository = $objectManager->getRepository(Classes::class);
		$classes = $classRepository->findBy([], ['className' => 'ASC']);

		$positionRepository = $objectManager->getRepository(Positions::class);
		$positions = $positionRepository->findBy([], ['position' => 'ASC']);

		$subjectRepository = $objectManager->getRepository(Subject::class);
		$subjects = $subjectRepository->findAll();

		return $this->render('admin/setup/initial.html.twig', [
			'classes' => $classes,
			'positions' => $positions,
			'subjects' => $subjects,
			'form' => $form->createView(),
		]);
	}

	/**
	 * @param Request $request
	 * @return RedirectResponse
	 *
	 * @Route(name="admin_setup_initial", path="/admin/setup/initial/", methods={"POST"})
	 */
	final public function setupSubmitAction(Request $request): RedirectResponse
	{
		$status = null;

		if ($request->isMethod('POST')) {

			$manager = $this->getDoctrine()->getManager();
			$classesManager = $manager->getRepository(Classes::class);
			$rolesManager = $manager->getRepository(Positions::class);

			$multiple_classes = $request->request->get('multiple_class_name', []);
			$single_class = $request->request->get('class_name');
			$multiple_roles = $request->request->get('multiple_roles', []);
			$single_role = $request->request->get('role_name');

			if ($single_role) {
				$multiple_roles[] = $single_role;
			}
			if ($single_class) {
				$multiple_classes[] = $single_class;
			}

			if (\count($multiple_classes) > 0) {
				foreach ($multiple_classes as $class) {
					if ($class && !$classesManager->findOneBy(['className' => strtoupper($class)])) {
						$cl = new Classes();
						$cl->setClassName(strtoupper($class));
						$manager->persist($cl);
						$manager->flush();
					}
				}
				ControllerUtils::addToSession($request, Constants::KEY_ACTION_SUCCESS,
					Constants::FLASH_FINISHED_INITIAL_SETUP);
			}
			if (\count($multiple_roles) > 0) {
				foreach ($multiple_roles as $role) {
					$role = strtoupper(str_replace(' ', '_', $role));
					if ($role && !$rolesManager->findOneBy(['position' => $role])) {
						$cl = new Positions();
						$cl->setPosition($role);
						$manager->persist($cl);
						$manager->flush();
					}
				}
				ControllerUtils::addToSession($request,Constants::KEY_ACTION_SUCCESS,
					Constants::FLASH_FINISHED_INITIAL_SETUP);
			}
		}
		return $this->redirectToRoute('admin_setup');
	}

	/**
	 * @param Request $request
	 * @param $subject_no
	 * @return RedirectResponse
	 *
	 * @Route(name="delete_subject", path="/admin/setup/subject/{subject_no}/delete/", methods={"GET"})
	 */
	final public function deleteSubjectAction(Request $request, $subject_no = null): RedirectResponse
	{
		//to implement delete subject action
		$man = $this->getDoctrine()->getManager();

		if ($subject_no !== null) {
			try {
				$repo = $man->getRepository(Subject::class);
				$subject = $repo->findOneBy(['subjectNo' => $subject_no]);
				if (!$subject) {
					ControllerUtils::addToSession($request,Constants::KEY_ACTION_ERROR,
						Constants::SUBJECT_NOT_FOUND);
				} else {
					$man->remove($subject);
					$man->flush();
					ControllerUtils::addToSession($request,Constants::KEY_ACTION_SUCCESS,
						Constants::SUBJECT_DELETED_SUCCESSFULLY);
				}
			} catch (Exception $e) {
				ControllerUtils::addToSession($request,Constants::KEY_ACTION_ERROR,
					Constants::SUBJECT_COULD_NOT_BE_DELETED);
			}
		}
		return $this->redirectToRoute('admin_setup');
	}
}
