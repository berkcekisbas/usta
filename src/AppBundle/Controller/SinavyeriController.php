<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sinavyeri;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sinavyeri controller.
 *
 * @Route("tanimlamalar/sinavyeri")
 */
class SinavyeriController extends Controller
{
    /**
     * Lists all sinavyeri entities.
     *
     * @Route("/", name="sinavyeri_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sinavyeris = $em->getRepository('AppBundle:Sinavyeri')->findAll();

        return $this->render('sinavyeri/index.html.twig', array(
            'sinavyeris' => $sinavyeris,

        ));
    }

    /**
     * Creates a new sinavyeri entity.
     *
     * @Route("/new", name="sinavyeri_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sinavyeri = new Sinavyeri();
        $form = $this->createForm('AppBundle\Form\SinavyeriType', $sinavyeri);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sinavyeri);
            $em->flush();

            return $this->redirectToRoute('sinavyeri_show', array('id' => $sinavyeri->getId()));
        }

        return $this->render('sinavyeri/new.html.twig', array(
            'sinavyeri' => $sinavyeri,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sinavyeri entity.
     *
     * @Route("/{id}", name="sinavyeri_show")
     * @Method("GET")
     */
    public function showAction(Sinavyeri $sinavyeri)
    {
        $deleteForm = $this->createDeleteForm($sinavyeri);

        return $this->render('sinavyeri/show.html.twig', array(
            'sinavyeri' => $sinavyeri,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sinavyeri entity.
     *
     * @Route("/{id}/edit", name="sinavyeri_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sinavyeri $sinavyeri)
    {
        $deleteForm = $this->createDeleteForm($sinavyeri);
        $editForm = $this->createForm('AppBundle\Form\SinavyeriType', $sinavyeri);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sinavyeri_edit', array('id' => $sinavyeri->getId()));
        }

        return $this->render('sinavyeri/edit.html.twig', array(
            'sinavyeri' => $sinavyeri,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'title' => array('label' => 'Sınav Yeri','icon' => 'fa fa-list')

        ));
    }

    /**
     * Deletes a sinavyeri entity.
     *
     * @Route("/{id}", name="sinavyeri_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sinavyeri $sinavyeri)
    {
        $form = $this->createDeleteForm($sinavyeri);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sinavyeri);
            $em->flush();
        }

        return $this->redirectToRoute('sinavyeri_index');
    }

    /**
     * Creates a form to delete a sinavyeri entity.
     *
     * @param Sinavyeri $sinavyeri The sinavyeri entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sinavyeri $sinavyeri)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sinavyeri_delete', array('id' => $sinavyeri->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
