<?php

namespace GaleriaBundle\Controller;

use GaleriaBundle\Entity\Local;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Local controller.
 *
 * @Route("local")
 */
class LocalController extends Controller
{
    /**
     * Lists all local entities.
     *
     * @Route("/", name="local_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $locals = $em->getRepository('GaleriaBundle:Local')->findAll();

        return $this->render('local/index.html.twig', array(
            'locals' => $locals,
        ));
    }

    /**
     * Creates a new local entity.
     *
     * @Route("/new", name="local_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $local = new Local();
        $form = $this->createForm('GaleriaBundle\Form\LocalType', $local);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($local);
            $em->flush();

            return $this->redirectToRoute('local_show', array('id' => $local->getId()));
        }

        return $this->render('local/new.html.twig', array(
            'local' => $local,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a local entity.
     *
     * @Route("/{id}", name="local_show")
     * @Method("GET")
     */
    public function showAction(Local $local)
    {
        $deleteForm = $this->createDeleteForm($local);

        return $this->render('local/show.html.twig', array(
            'local' => $local,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing local entity.
     *
     * @Route("/{id}/edit", name="local_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Local $local)
    {
        $deleteForm = $this->createDeleteForm($local);
        $editForm = $this->createForm('GaleriaBundle\Form\LocalType', $local);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('local_edit', array('id' => $local->getId()));
        }

        return $this->render('local/edit.html.twig', array(
            'local' => $local,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a local entity.
     *
     * @Route("/{id}", name="local_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Local $local)
    {
        $form = $this->createDeleteForm($local);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($local);
            $em->flush();
        }

        return $this->redirectToRoute('local_index');
    }

    /**
     * Creates a form to delete a local entity.
     *
     * @param Local $local The local entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Local $local)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('local_delete', array('id' => $local->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
