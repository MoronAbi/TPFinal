<?php

namespace GaleriaBundle\Controller;

use GaleriaBundle\Entity\Propietario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;



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
        $response = new Response();
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $response->setContent(json_encode(array(
        'propietarios' => $serializer->serialize($propietarios, 'json'),
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response; 
    }

    /**
     * Creates a new propietario entity.
     *
     * @Route("/new", name="propietario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $request->request->replace($data);
       
        $propietario = new Propietario();
        $propietario->setApellido($request->request->get('apellido'));
        $propietario->setNombres($request->request->get('nombres'));
        $propietario->setDni($request->request->get('dni'));
        $propietario->setEmail($request->request->get('email'));
        $propietario->setTelefono($request->request->get('telefono'));

        $em = $this->getDoctrine()->getManager();    
        $em->persist($propietario);
        $em->flush();
       
        $result['status'] = 'ok';
        return new Response(json_encode($result), 200);
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
        $data = json_decode($request->getContent(), true);
        $request->request->replace($data);
        $sn = $this->getDoctrine()->getManager();
        $prop = $sn->getRepository('GaleriaBundle:Propietario')->find($request->request->get('id'));

        $prop->setApellido($request->request->get('apellido'));
        $prop->setNombres($request->request->get('nombres'));
        $prop->setDni($request->request->get('dni'));
        $prop->setEmail($request->request->get('email'));
        $prop->setTelefono($request->request->get('telefono'));
        $sn->flush();

        $result['status'] = 'ok';
        return new Response(json_encode($result), 200);
    }

    /**
     * Deletes a propietario entity.
     *
     * @Route("/{id}", name="propietario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Propietario $propietario)
    {
        $data = new Propietario;
        $sn = $this->getDoctrine()->getManager();
    
        $prop = $this->getDoctrine()->getRepository('GaleriaBundle:Propietario')->find($propietario);
        $sn->remove($prop);
        $sn->flush();
        $result['status'] = 'ok';
        return new Response(json_encode($result), 200);
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
