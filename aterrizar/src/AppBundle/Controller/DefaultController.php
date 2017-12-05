<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      $form_vuelo = $this->createFormBuilder()
          ->add('origen', TextType::class, array("attr" => array("placeholder" => "Origen")))
          ->add('destino', TextType::class, array("attr" => array("placeholder" => "Destino")))
          ->add('fecha', TextType::class, array("attr" => array("placeholder" => "Fecha")))
          ->getForm();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'form_vuelo' => $form_vuelo->createView(),
        ]);
    }

    /**
     * @Route("/buscar", name="buscar")
     */
    public function buscador(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/buscador.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
