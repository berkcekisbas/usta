<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pozisyon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pozisyon controller.
 *
 * @Route("tanimlamalar/pozisyon")
 */
class PozisyonController extends Controller
{
    /**
     * Lists all pozisyon entities.
     *
     * @Route("/", name="pozisyon_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pozisyons = $em->getRepository('AppBundle:Pozisyon')->findAll();

        return $this->render('liste_2.html.twig', array(
            'datas' => $pozisyons,
            'title' => array('label' => 'Pozisyonlar','icon' => 'fa fa-list')

        ));
    }

    /**
     * Creates a new pozisyon entity.
     *
     * @Route("/new", name="pozisyon_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pozisyon = new Pozisyon();
        $form = $this->createForm('AppBundle\Form\PozisyonType', $pozisyon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pozisyon);
            $em->flush();

            $this->addFlash('success',"Ekleme Başarılı !");

            return $this->redirectToRoute('pozisyon_index', array('id' => $pozisyon->getId()));
        }

        return $this->render('form.html.twig', array(
            'pozisyon' => $pozisyon,
            'form' => $form->createView(),
            'title' => array('label' => 'Yeni Pozisyon','icon' => 'fa fa-plus')
        ));
    }

    /**
     * Displays a form to edit an existing pozisyon entity.
     *
     * @Route("/{id}/edit", name="pozisyon_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pozisyon $pozisyon)
    {
        $editForm = $this->createForm('AppBundle\Form\PozisyonType', $pozisyon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success',"Düzenleme Başarılı !");

            return $this->redirectToRoute('pozisyon_index', array('id' => $pozisyon->getId()));
        }


        return $this->render('form.html.twig', array(
            'pozisyon' => $pozisyon,
            'form' => $editForm->createView(),
            'title' => array('label' => 'Yeni Pozisyon','icon' => 'fa fa-plus')
        ));
    }

    /**
     * Deletes a pozisyon entity.
     *
     * @Route("/{id}", name="pozisyon_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            $pozisyon = $em->getRepository('AppBundle:Pozisyon')->find($request->get('id'));
            $em->remove($pozisyon);
            $em->flush();

            $this->addFlash('success',"Silme Başarılı !");

        return $this->redirectToRoute('pozisyon_index');
    }

    /**
     * Creates a form to delete a pozisyon entity.
     *
     * @param Pozisyon $pozisyon The pozisyon entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pozisyon $pozisyon)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pozisyon_delete', array('id' => $pozisyon->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
