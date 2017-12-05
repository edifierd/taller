<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository\VueloRepository;

class BusquedaController extends Controller
{

  /**
   * @Route("/busqueda_vuelos", name="busqueda_vuelos")
   */
  public function vuelosAction(Request $request)
  {
      if ($request->isMethod('POST')) {

        $form = $request->request->get("form");
        $vuelos = VueloRepository::getVuelosByBusqueda($form["origen"], $form["destino"], $form["fecha"], 1);
        // replace this example code with whatever you need
        return $this->render('busqueda/busqueda_vuelos.html.twig', [
          'vuelos' => $vuelos,
        ]);
      }
  }

}
