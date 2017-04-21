<?php

namespace TanimlamalarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use TanimlamalarBundle\Entity\Birim;
use TanimlamalarBundle\Entity\Yeterlilik;
use Symfony\Component\Form\FormBuilderInterface;
use TanimlamalarBundle\Form\BirimType;
use TanimlamalarBundle\TanimlamalarBundle;


class BirimController extends Controller
{

    /**
     * @Route("/tanimlamalar/birim/yeni" , name="birim_yeni")
     */
    public function yeniAction(Request $request)
    {

        $birim = new Birim();

        $form = $this->createForm(BirimType::class ,$birim);

        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($birim);

        if ($form->isSubmitted() && $form->isValid()) {

            $yeterlilik = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($birim);
            $em->flush();

            $this->addFlash('success',"Kayıt İşlemi Başarılı");

            return $this->redirectToRoute('birim_yeni');
        }

        return $this->render('form.html.twig', array(
            'form' => $form->createView(),'errors' => $errors,'title' => array('label' => 'Yeni Birim','icon' => 'fa fa-plus')
        ));
    }


    /**
     * @Route("/tanimlamalar/birim/liste",name="birim_liste")
     */
    public function listeAction(Request $request)
    {
        $yeterlilikid = null;
        $label = "Birimler";

        if($request->get('yeterlilikid'))
        {
            $em = $this->getDoctrine()->getManager();
            $yeterlilik = $em->getRepository('TanimlamalarBundle:Yeterlilik')->find($request->get('yeterlilikid'));

            $label = "Birimler / ".$yeterlilik->getAd();
            $yeterlilikid = $yeterlilik->getId();
        }


        $datatable = $this->get('app.datatable.birim.liste');
        $datatable->buildDatatable();

        $datatable->getAjax()->set(array(
            'url' => $this->generateUrl('birim_results',array('yeterlilikid' => $yeterlilikid)),
            'type' => 'GET',
            'pipeline' => 0
        ));


        return $this->render('liste.html.twig', array(
            'datatable' => $datatable,'title' => array('label' => $label,'icon' => 'fa fa-list')
        ));
    }

    /**
     * @Route("/tanimlamalar/birim/liste/results/{yeterlilikid}",defaults={"yeterlilikid" = null}, name="birim_results")
     */
    public function listeResultsAction(Request $request,$yeterlilikid)
    {
        $datatable = $this->get('app.datatable.birim.liste');
        $datatable->buildDatatable();

        $query = $this->get('sg_datatables.query')->getQueryFrom($datatable);
        $query->buildQuery();

        $qb = $query->getQuery();
        if(!is_null($yeterlilikid))
        {
            $qb->andWhere("birim.yeterlilik = :b");
            $qb->setParameter('b',$yeterlilikid);
        }
        $query->setQuery($qb);


        return $query->getResponse(false);

    }

    /**
     * @Route("/tanimlamalar/birim/sil/{id}" , name="birim_sil")
     */
    public function silAction(Request $request,$id)
    {
        try{
            $em = $this->getDoctrine()->getManager();

            $repo = $em->getRepository('TanimlamalarBundle:Birim')->find($id);

            $em->remove($repo); 
            $em->flush();
        } catch (\Exception $e)
        {
            $this->addFlash('error',"HATA !");

        }

        return $this->redirectToRoute('birim_liste');

    }




}
