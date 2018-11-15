<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 16/12/2018
 * Time: 21:49
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SyllabusController extends Controller
{
	final public function syllabusAction(): Response
	{
		return $this->render('admin/setup/syllabus.html.twig');
	}

}
