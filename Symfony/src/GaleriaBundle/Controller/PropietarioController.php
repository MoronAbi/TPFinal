<?php

namespace GaleriaBundle\Controller;

use GaleriaBundle\Entity\Propietario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Propietario controller.
 *
 * @Route("propietario")
 */
class PropietarioController extends Controller
{
    /**
     * Lists all propietario entities.
     *
     * @Route("/", name="propietario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $propietarios = $em->getRepository('GaleriaBundle:Propietario')->findAll();

        return $this->render('propietario/index.html.twig', array(
            'propietarios' => $propietarios,
        ));
    }

    /**
     * Creates a new propietario entity.
     *
     * @Route("/new", name="propietario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $propietario = new Propietario();
        $form = $this->createForm('GaleriaBundle\Form\PropietarioType', $propietario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($propietario);
            $em->flush();

            return $this->redirectToRoute('propietario_show', array('id' => $propietario->getId()));
        }

        return $this->render('propietario/new.html.twig', array(
            'propietario' => $propietario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a propietario entity.
     *
     * @Route("/{id}", name="propietario_show")
     * @Method("GET")
     */
    public function showAction(Propietario $propietario)
    {
        $deleteForm = $this->createDeleteForm($propietario);

        return $this->render('propietario/show.html.twig', array(
            'propietario' => $propietario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing propietario entity.
     *
     * @Route("/{id}/edit", name="propietario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Propietario $propietario)
    {
        $deleteForm = $this->createDeleteForm($propietario);
        $editForm = $this->createForm('GaleriaBundle\Form\PropietarioType', $propietario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('propietario_edit', array('id' => $propietario->getId()));
        }

        return $this->render('propietario/edit.html.twig', array(
            'propietario' => $propietario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a propietario entity.
     *
     * @Route("/{id}", name="propietario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Propietario $propietario)
    {
        $form = $this->createDeleteForm($propietario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($propietario);
            $em->flush();
        }

        return $this->redirectToRoute('propietario_index');
    }

    /**
     * Creates a form to delete a propietario entity.
     *
     * @param Propietario $propietario The propietario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Propietario $propietario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('propietario_delete', array('id' => $propietario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
