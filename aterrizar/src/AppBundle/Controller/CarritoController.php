<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\ServicioReserva;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Security("has_role('ROLE_USER')")
 */
class CarritoController extends Controller
{

  /**
   * @Route("/carrito", name="carrito")
   */
  public function listarCarrito(Request $request)
  {
      return $this->render('carrito/carrito.html.twig', [
          'servicios_reserva' => $this->getUser()->getCarrito()->getServiciosReserva(),
      ]);
  }

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
      $servicio_reserva->setCarrito($this->getUser()->getCarrito());
      $this->getUser()->getCarrito()->addServiciosReserva($servicio_reserva);
      $em->persist($servicio_reserva);
      $em->persist($this->getUser()->getCarrito());
      $em->flush();

      return $this->redirectToRoute('carrito');
  }

  /**
   * @Route("/carrito/eliminar/{id}", name="eliminar_carrito")
   */
  public function EliminarDelCarrito(Request $request, $id)
  {
      $em = $this->getDoctrine()->getManager();
      $servicio_reserva = $em->getRepository('AppBundle:ServicioReserva')->find($id);
      $this->getUser()->getCarrito()->removeServiciosReserva($servicio_reserva);
      $em->persist($this->getUser()->getCarrito());
      $em->remove($servicio_reserva);
      $em->flush();

      return $this->redirectToRoute('carrito');
  }

}
