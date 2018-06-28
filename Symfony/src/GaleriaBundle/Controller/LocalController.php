<?php

namespace GaleriaBundle\Controller;

use GaleriaBundle\Entity\Local;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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
        $response = new Response();
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $response->setContent(json_encode(array(
        'locals' => $serializer->serialize($locals, 'json'),
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response; 
    }

    /**
     * Creates a new local entity.
     *
     * @Route("/new", name="local_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $request->request->replace($data);
       
        $local = new Local();
        $local->setSuperficie($request->request->get('superficie'));
        $local->setHabilitado($request->request->get('habilitado'));
        $local->setCostomes($request->request->get('costomes'));
        $local->setPathimagen($request->request->get('pathimagen'));
        $local->setAlquilado($request->request->get('alquilado'));

        $em = $this->getDoctrine()->getManager();    
        $em->persist($local);
        $em->flush();
       
        $result['status'] = 'ok';
        return new Response(json_encode($result), 200);
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
        $data = json_decode($request->getContent(), true);
        $request->request->replace($data);
        $sn = $this->getDoctrine()->getManager();
        $loc = $sn->getRepository('GaleriaBundle:Local')->find($request->request->get('id'));

        $loc->setSuperficie($request->request->get('superficie'));
        $loc->setHabilitado($request->request->get('habilitado'));
        $loc->setCostomes($request->request->get('costomes'));
        $loc->setPathimagen($request->request->get('pathimagen'));
        $loc->setAlquilado($request->request->get('alquilado'));
        $sn->flush();

        $result['status'] = 'ok';
        return new Response(json_encode($result), 200);
    }

    /**
     * Deletes a local entity.
     *
     * @Route("/{id}", name="local_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Local $local)
    {
        $data = new Local;
        $sn = $this->getDoctrine()->getManager();
    
        $loc = $this->getDoctrine()->getRepository('GaleriaBundle:Local')->find($local);
        $sn->remove($loc);
        $sn->flush();
        $result['status'] = 'ok';
        return new Response(json_encode($result), 200);
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
