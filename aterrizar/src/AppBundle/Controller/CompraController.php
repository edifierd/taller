<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CompraController extends Controller
{

  /**
   * @Route("/compra/new", name="nueva_compra")
   */
  public function nuevaCompra(Request $request){

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

}
