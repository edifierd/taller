<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Reserva;

class CompraController extends Controller
{

  /**
   * @Route("/compra/new", name="nueva_compra")
   */
  public function nuevaCompra(Request $request){

      $em = $this->getDoctrine()->getManager();
      $reserva = new Reserva();
      $reserva->setUser($this->getUser());
      $reserva->setFecha(new \DateTime());

      foreach($this->getUser()->getCarrito()->getServiciosReserva() as $servicio_reserva){
        $servicio_reserva->setCarrito(null);
        $servicio_reserva->setReserva($reserva);
        $servicio_reserva->getServicio()->actualizar();
        $reserva->addServiciosReserva($servicio_reserva);
      }

      $this->getUser()->addReserva($reserva);
      $em->persist($this->getUser());
      $em->flush();

      return $this->redirectToRoute('compras');

  }

  /**
   * @Route("/compras/show/{id}", name="compra_show")
   */
  public function show(Request $request,$id){

    $em = $this->getDoctrine()->getManager();
    $reserva = $em->getRepository("AppBundle:Reserva")->find($id);

    return $this->render('compra/compras.html.twig', [
        'reserva' => $reserva,
    ]);

  }

  /**
   * @Route("/compras", name="compras")
   */
  public function verCompras(Request $request){

    return $this->render('compra/listaCompras.html.twig', [
        'compras' => $this->getUser()->getReservas(),
    ]);

  }

  /**
   * @Route("/compra/pago", name="pago")
   */
  public function pago(Request $request)
  {
      // replace this example code with whatever you need
      return $this->render('compra/pago.html.twig', [

      ]);
  }

}
