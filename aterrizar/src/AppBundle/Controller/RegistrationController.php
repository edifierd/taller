<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;


class RegistrationController extends BaseController
{

	public function registerAction(Request $request)
    {
       	if ($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
           $this->container->get('session')->getFlashBag()->add('fos_user_error', "Ya hay un usuario loggeado.");
           return new RedirectResponse($this->container->get ('router')->generate ('homepage'));
        }
       	return parent::registerAction($request);
    }
}
