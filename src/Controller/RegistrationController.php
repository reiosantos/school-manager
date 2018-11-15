<?php

namespace App\Controller;

use App\Entity\AuthUser;
use App\Entity\Staff;
use App\Entity\Student;
use App\Form\RegistrationFormType;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Created by PhpStorm.
 * User: reiosantos
 * Date: 6/20/17
 * Time: 10:07 PM
 */

class RegistrationController extends \FOS\UserBundle\Controller\RegistrationController
{
	protected $formFactoryOverride, $dispatcher, $userManagerOverride, $tokenStorageOverride;

	public function __construct(EventDispatcherInterface $eventDispatcher, FactoryInterface $formFactory, UserManagerInterface $userManager, TokenStorageInterface $tokenStorage) {
		$this->dispatcher = $eventDispatcher;
		$this->formFactoryOverride = $formFactory;
		$this->userManagerOverride = $userManager;
		$this->tokenStorageOverride = $tokenStorage;

		parent::__construct($this->dispatcher, $this->formFactoryOverride, $this->userManagerOverride, $this->tokenStorageOverride);
	}

	/**
     *
     * Registration Controller overridden with custom modifications
     *
     * @param Request $request
     *
     * @return Response
     */
    final public function registerAction(Request $request): Response
	{
        $user = $this->userManagerOverride->createUser();

        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $this->dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $this->createForm(RegistrationFormType::class);

        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                /*****************************************
                 * //new functionality
                 *************************************/

                $data = $form->getData();
                $id = $data->getUserNo();

                $repository_manager = $this->getDoctrine()->getManager();
                $repository_login = $repository_manager->getRepository(AuthUser::class);

                $login = $repository_login->findOneBy(['userNo'=>$id]);
                if($login){
                    return $this->render('@FOSUser/Registration/register.html.twig', array(
                        'form' => $form->createView(),'error' => 'This account has already been activated'
                    ));
                }

                $repository_staff = $repository_manager->getRepository(Staff::class);
                $repository_student = $repository_manager->getRepository(Student::class);

                $student = $repository_student->findOneBy(['studentNo'=>$id]);

                if (!$student){

                    $staff = $repository_staff->findOneBy(['staffNo'=>$id]);
                    if(!$staff){

                        return $this->render('@FOSUser/Registration/register.html.twig', array(
                            'form' => $form->createView(),'error'=>'This ID `'.$id.'` is not valid. Please consult the administrator'
                        ));
                    }
                    $user->setEmail($staff->getEmail() ?? $staff->getStaffNo());

                    $user->setEmailCanonical($staff->getEmail() ?? $staff->getStaffNo());
					$user->setRoles($staff->getRoles());
				} else {
					$user->setEmail($student->getId());
					$user->setEmailCanonical($student->getId());
					$user->setRoles($student->getRoles());
				}

                /*****************************************
                 * Ebd of new functionality
                 *************************************/

                $event = new FormEvent($form, $request);
                $this->dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $this->userManagerOverride->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $this->dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }

            $event = new FormEvent($form, $request);
            $this->dispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

            if (null !== $response = $event->getResponse()) {
                return $response;
            }
        }

        return $this->render('@FOSUser/Registration/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
