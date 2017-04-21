<?php

namespace TanimlamalarBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints as Assert;
use TanimlamalarBundle\Entity\Yeterlilik;
use Symfony\Component\Form\FormBuilderInterface;
use TanimlamalarBundle\Form\YeterlilikType;





class YeterlilikController extends Controller
{

    /**
     * @Route("/tanimlamalar/yeterlilik/yeni" , name="yeterlilik_yeni")
     */
    public function yeniAction(Request $request)
    {
        $yeterlilik = new Yeterlilik();

        $form = $this->createForm(YeterlilikType::class ,$yeterlilik);

        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($yeterlilik);

        if ($form->isSubmitted() && $form->isValid()) {

                $yeterlilik = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($yeterlilik);
                $em->flush();

            $this->addFlash('success',"Kayıt İşlemi Başarılı");
                return $this->redirectToRoute('yeterlilik_liste');
        }

        return $this->render('form.html.twig', array(
            'form' => $form->createView(),'errors' => $errors,'title' => array('label' => 'Yeni Yeterlilik','icon' => 'fa fa-plus')
        ));
    }

    /**
     * @Route("/tanimlamalar/yeterlilik/guncelle/{id}" , name="yeterlilik_guncelle")
     */
    public function updateAction(Request $request , $id)
    {
        $yeterlilik = new Yeterlilik();

        $em = $this->getDoctrine()->getEntityManager();
        $yeterlilikData = $em->getRepository('TanimlamalarBundle:Yeterlilik')->find($id);

        $form = $this->createForm(YeterlilikType::class ,$yeterlilikData);

        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($yeterlilik);

        if ($form->isSubmitted() && $form->isValid()) {

                $yeterlilik = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($yeterlilik);
                $em->flush();

                $this->addFlash('success',"Kayıt İşlemi Başarılı");

                return $this->redirectToRoute('yeterlilik_liste',array(
                    'id' => $yeterlilikData->getId()
                ));
        }


        return $this->render('form.html.twig', array(
            'form' => $form->createView(),'title' => array('label' => 'Yeni Yeterlilik','icon' => 'fa fa-plus')
        ));
    }

    /**
     * @Route("/tanimlamalar/yeterlilik/sil/{id}" , name="yeterlilik_sil")
     */
    public function silAction(Request $request , $id)
    {
        try
        {
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository('TanimlamalarBundle:Yeterlilik')->find($id);

            $em->remove($repo);
            $em->flush();

            $this->addFlash('success',"Silme İşlemi Başarılı");


        } catch (\Exception $e)
        {
            $this->addFlash('error',"Bu veriye Bağlı Alet Elemanları Silmeniz Gerekmektedir !");

        }

        return $this->redirectToRoute('yeterlilik_liste');
    }

    /**
     * @Route("/tanimlamalar/yeterlilik/liste", name="yeterlilik_liste")
     * @Method("GET")
     */
    public function listeAction()
    {
        $datatable = $this->get('app.datatable.yeterlilik.liste');
        $datatable->buildDatatable();

        return $this->render('liste.html.twig', array(
            'datatable' => $datatable,'title' => array('label' => 'Yeterlilikler','icon' => 'fa fa-list')
        ));
    }

    /**
     * @Route("/tanimlamalar/yeterlilik/liste/results", name="yeterlilik_results")
     */
    public function listeResultsAction()
    {
        $datatable = $this->get('app.datatable.yeterlilik.liste');
        $datatable->buildDatatable();

        $query = $this->get('sg_datatables.query')->getQueryFrom($datatable);

        return $query->getResponse();
    }
}

