<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request){

      $form_vuelo = $this->createFormBuilder()
          ->setAction($this->generateUrl('busqueda_vuelos'))
          ->add('origen', EntityType::class, array("class" => "AppBundle:Ubicacion",'placeholder'  => 'Seleccione un origen', "attr" => array("placeholder" => "Origen")))
          ->add('destino', EntityType::class, array("class" => "AppBundle:Ubicacion", 'placeholder'  => 'Seleccione un destino', "attr" => array("placeholder" => "Destino")))
          ->add('fecha', TextType::class, array("required" => true, "attr" => array("placeholder" => "Fecha", "class" => "datepicker")))
          ->add('buscar', SubmitType::class, array('attr' => array('class' => 'btn waves-effect waves-light')))
          ->getForm();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'form_vuelo' => $form_vuelo->createView(),
        ]);

    }

    /**
     * @Route("/carrito", name="carrito")
     */
    public function carrito(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('carrito/carrito.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/pago", name="pago")
     */
    public function pago(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('carrito/pago.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

}
