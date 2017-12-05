<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\ServicioReserva;

class CarritoController extends Controller
{

  /**
   * @Route("/carrito/agregar", name="agregar_carrito")
   */
  public function agragarAlCarrito(Request $request)
  {
      $em = $this->getDoctrine()->getManager();
      $servicio = $em->getRepository('AppBundle:Servicio')->find($request->request->get("id"));
      $servicio_reserva = new ServicioReserva();
      $fecha_ini = new \DateTime($request->request->get("fecha_inicio"));
      $fecha_fin = new \DateTime($request->request->get("fecha_fin"));
      $servicio_reserva->setFechaInicio($fecha_ini);
      $servicio_reserva->setFechaFin($fecha_fin);
      $servicio_reserva->setServicio($servicio);
      $this->getUser()->getCarrito()->addServicio($servicio_reserva);
      $em->persist($this->getUser()->getCarrito());
      $em->flush();
      // replace this example code with whatever you need
      return $this->render('carrito/carrito.html.twig', [
          'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
      ]);
  }

}
