<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository\VueloRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BusquedaController extends Controller
{

  /**
   * @Route("/busqueda_vuelos", name="busqueda_vuelos")
   */
  public function vuelosAction(Request $request)
  {
      if ($request->isMethod('POST')) {
        $form = $request->request->get("form");
        $em = $this->getDoctrine()->getManager();
        $origen = $em->getRepository("AppBundle:Ubicacion")->find($form["origen"]);
        $destino = $em->getRepository("AppBundle:Ubicacion")->find($form["destino"]);

        $form_vuelo = $this->createFormBuilder()
            ->setAction($this->generateUrl('busqueda_vuelos'))
            ->add('origen', EntityType::class, array("class" => "AppBundle:Ubicacion", "data" => $origen, 'placeholder'  => 'Seleccione un origen'))
            ->add('destino', EntityType::class, array("class" => "AppBundle:Ubicacion", "data" => $destino, 'placeholder'  => 'Seleccione un destino'))
            ->add('fecha', TextType::class, array("required" => true, "data" => $form["fecha"], "attr" => array("placeholder" => "Fecha", "class" => "datepicker")))
            ->add('buscar', SubmitType::class, array('attr' => array('class' => 'btn waves-effect waves-light')))
            ->getForm();

        $vuelos = $em->getRepository("AppBundle:Vuelo")->getVuelosByBusqueda($form["origen"], $form["destino"], $form["fecha"], 1);
        // replace this example code with whatever you need
        return $this->render('busqueda/busqueda_vuelos.html.twig', [
          'vuelos' => $vuelos,
          'form_vuelo' => $form_vuelo->createView(),
          'form' => $form
        ]);
      }
  }

}
