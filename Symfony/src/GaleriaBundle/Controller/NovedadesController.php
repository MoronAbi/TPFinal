<?php

namespace GaleriaBundle\Controller;

use GaleriaBundle\Entity\Novedades;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Novedade controller.
 *
 * @Route("novedades")
 */
class NovedadesController extends Controller
{
    /**
     * Lists all novedade entities.
     *
     * @Route("/", name="novedades_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $novedades = $em->getRepository('GaleriaBundle:Novedades')->findAll();

        return $this->render('novedades/index.html.twig', array(
            'novedades' => $novedades,
        ));
    }

    /**
     * Creates a new novedade entity.
     *
     * @Route("/new", name="novedades_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $novedade = new Novedade();
        $form = $this->createForm('GaleriaBundle\Form\NovedadesType', $novedade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($novedade);
            $em->flush();

            return $this->redirectToRoute('novedades_show', array('id' => $novedade->getId()));
        }

        return $this->render('novedades/new.html.twig', array(
            'novedade' => $novedade,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a novedade entity.
     *
     * @Route("/{id}", name="novedades_show")
     * @Method("GET")
     */
    public function showAction(Novedades $novedade)
    {
        $deleteForm = $this->createDeleteForm($novedade);

        return $this->render('novedades/show.html.twig', array(
            'novedade' => $novedade,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing novedade entity.
     *
     * @Route("/{id}/edit", name="novedades_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Novedades $novedade)
    {
        $deleteForm = $this->createDeleteForm($novedade);
        $editForm = $this->createForm('GaleriaBundle\Form\NovedadesType', $novedade);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('novedades_edit', array('id' => $novedade->getId()));
        }

        return $this->render('novedades/edit.html.twig', array(
            'novedade' => $novedade,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a novedade entity.
     *
     * @Route("/{id}", name="novedades_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Novedades $novedade)
    {
        $form = $this->createDeleteForm($novedade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($novedade);
            $em->flush();
        }

        return $this->redirectToRoute('novedades_index');
    }

    /**
     * Creates a form to delete a novedade entity.
     *
     * @param Novedades $novedade The novedade entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Novedades $novedade)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('novedades_delete', array('id' => $novedade->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
