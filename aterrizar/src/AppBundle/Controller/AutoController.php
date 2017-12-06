<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Auto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * Auto controller.
 * @Security("has_role('ROLE_ADMIN')")
 * @Route("auto")
 */
class AutoController extends Controller
{
    /**
     * Lists all auto entities.
     *
     * @Route("/", name="auto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $autos = $em->getRepository('AppBundle:Auto')->findAll();

        return $this->render('auto/index.html.twig', array(
            'autos' => $autos,
        ));
    }

    /**
     * Creates a new auto entity.
     *
     * @Route("/new", name="auto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $auto = new Auto();
        $form = $this->createForm('AppBundle\Form\AutoType', $auto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auto);
            $em->flush();

            return $this->redirectToRoute('auto_show', array('id' => $auto->getId()));
        }

        return $this->render('auto/new.html.twig', array(
            'auto' => $auto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a auto entity.
     *
     * @Route("/{id}", name="auto_show")
     * @Method("GET")
     */
    public function showAction(Auto $auto)
    {
        $deleteForm = $this->createDeleteForm($auto);

        return $this->render('auto/show.html.twig', array(
            'auto' => $auto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing auto entity.
     *
     * @Route("/{id}/edit", name="auto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Auto $auto)
    {
        $deleteForm = $this->createDeleteForm($auto);
        $editForm = $this->createForm('AppBundle\Form\AutoType', $auto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('auto_edit', array('id' => $auto->getId()));
        }

        return $this->render('auto/edit.html.twig', array(
            'auto' => $auto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a auto entity.
     *
     * @Route("/{id}", name="auto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Auto $auto)
    {
        $form = $this->createDeleteForm($auto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($auto);
            $em->flush();
        }

        return $this->redirectToRoute('auto_index');
    }

    /**
     * Creates a form to delete a auto entity.
     *
     * @param Auto $auto The auto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Auto $auto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auto_delete', array('id' => $auto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
