<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 15/11/2018
 * Time: 08:30
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @Route(name="home_page", path="/", methods={"GET"})
	 */
    final public function indexAction(): Response
    {
    	$this->denyAccessUnlessGranted('ROLE_USER');

    	return $this->redirectToRoute('admin_setup');
    }

	/**
	 * @Route(name="placeholder_page", path="/placeholder/")
	 * @return Response
	 */

    final public function placeholderAction(): Response
	{
		return $this->render('admin/placeholder.html.twig',
			['data' => 'This url is under development. We shall be implementing this view shortly']);
	}
}
