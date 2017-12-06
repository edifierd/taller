<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vuelo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Vuelo controller.
 *
 * @Security("has_role('ROLE_ADMIN')")
 * @Route("vuelo")
 */
class VueloController extends Controller
{
    /**
     * Lists all vuelo entities.
     *
     * @Route("/", name="vuelo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vuelos = $em->getRepository('AppBundle:Vuelo')->findAll();

        return $this->render('vuelo/index.html.twig', array(
            'vuelos' => $vuelos,
        ));
    }

    /**
     * Creates a new vuelo entity.
     *
     * @Route("/new", name="vuelo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vuelo = new Vuelo();
        $form = $this->createForm('AppBundle\Form\VueloType', $vuelo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vuelo);
            $em->flush();

            return $this->redirectToRoute('vuelo_show', array('id' => $vuelo->getId()));
        }

        return $this->render('vuelo/new.html.twig', array(
            'vuelo' => $vuelo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vuelo entity.
     *
     * @Route("/{id}", name="vuelo_show")
     * @Method("GET")
     */
    public function showAction(Vuelo $vuelo)
    {
        $deleteForm = $this->createDeleteForm($vuelo);

        return $this->render('vuelo/show.html.twig', array(
            'vuelo' => $vuelo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vuelo entity.
     *
     * @Route("/{id}/edit", name="vuelo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vuelo $vuelo)
    {
        $deleteForm = $this->createDeleteForm($vuelo);
        $editForm = $this->createForm('AppBundle\Form\VueloType', $vuelo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vuelo_edit', array('id' => $vuelo->getId()));
        }

        return $this->render('vuelo/edit.html.twig', array(
            'vuelo' => $vuelo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vuelo entity.
     *
     * @Route("/{id}", name="vuelo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vuelo $vuelo)
    {
        $form = $this->createDeleteForm($vuelo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vuelo);
            $em->flush();
        }

        return $this->redirectToRoute('vuelo_index');
    }

    /**
     * Creates a form to delete a vuelo entity.
     *
     * @param Vuelo $vuelo The vuelo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vuelo $vuelo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vuelo_delete', array('id' => $vuelo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
