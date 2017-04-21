<?php

namespace SorubankasiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SorubankasiBundle\Form\TeorikSoruType;
use SorubankasiBundle\Entity\TeorikSoru;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;



class TeorikSoruController extends Controller
{
    /**
     * @Route("/sorubankasi/teorik/yeni/{yeterlilikid}/{birimid}" , name="teorik_soru__yeni")
     */
    public function yeniAction(Request $request,$yeterlilikid,$birimid)
    {
        $em = $this->getDoctrine()->getManager();

        //$yeterlilik      = $em->getRepository('TanimlamalarBundle:Yeterlilik')->find($yeterlilikid);
        $birim      = $em->getRepository('TanimlamalarBundle:Birim')->find($birimid);


        $teoriksoru = new TeorikSoru();



        $form = $this->createFormBuilder($teoriksoru)
           // ->add('yeterlilik', TextType::class, array('data' => $yeterlilik->getId(),'label' => 'Yeterlilik : ','required' => false))
            //->add('birim', TextType::class, array('data' => $birim->getId(),'label' => 'Birim : ','required' => false))

            ->add('soru', TextareaType::class, array('attr' => array('class' => 'ckeditor form-control'),'label' => 'Soru : ','empty_data' => null,'required' => false))
            ->add('zorlukderecesi', ChoiceType::class, array('placeholder' => 'Seçiniz','required' => false,
                'choices'  => array(
                    '1' => "1",
                    '2' => "2",
                    '3' => "3",
                ),'label' => 'Zorluk Derecesi :'))
            ->add('resim', FileType::class, array('label' => 'Resim :','required' => false))
             ->add('a', TextType::class, array('label' => 'Cevap A : ','required' => false))
             ->add('b', TextType::class, array('label' => 'Cevap B : ','required' => false))
            ->add('c', TextType::class, array('label' => 'Cevap C : ','required' => false))
            ->add('d', TextType::class, array('label' => 'Cevap D : ','required' => false))
            ->add('e', TextType::class, array('label' => 'Cevap E : ','required' => false))
            ->add('dogrucevap', ChoiceType::class, array('placeholder' => 'Seçiniz','required' => false,
                'choices'  => array(
                    'A' => "A",
                    'B' => "B",
                    'C' => "C",
                    'D' => "D",
                    'E' => "E",
                ),'label' => 'Doğru Cevap Şıkkı :'))

            ->add('save', SubmitType::class, array('label' => 'Kaydet'))
            ->getForm();


        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($teoriksoru);


        if ($form->isSubmitted() && $form->isValid()) {

            $file = $teoriksoru->getResim();

            if($file)
            {

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('upload_directory'),
                    $fileName
                );

                $teoriksoru->setResim($fileName);

            }


            $teoriksoru = $form->getData();

            $teoriksoru->setBirim($birim);
            //$teoriksoru->setYeterlilik($yeterlilikid);

            $em = $this->getDoctrine()->getManager();
            $em->persist($teoriksoru);
            $em->flush();

            $this->addFlash('success',"Soru Ekleme Başarılı !");
            return $this->redirectToRoute('teorik_soru__yeni',array('yeterlilikid' => $birim->getYeterlilik()->getId(),'birimid' => $birim->getId()));
        }



        return $this->render('SorubankasiBundle::form.html.twig', array(
            'form' => $form->createView(),'errors' => $errors,'yeterlilik' => $birim->getYeterlilik()->getAd(),'birim' => $birim->getAd(),'title' => array('label' => 'Yeni Soru','icon' => 'fa fa-plus')
        ));



    }

    /**
     * @Route("/sorubankasi/teorik/liste/{yeterlilikid}/{birimid}", name="teoriksoru_liste")
     * @Method("GET")
     */
    public function listeAction(Request $request,$yeterlilikid,$birimid)
    {

        //$yeterlilik = $this->getDoctrine()->getManager()->getRepository('TanimlamalarBundle:Yeterlilik')->find($yeterlilikid);
        $birim = $this->getDoctrine()->getManager()->getRepository('TanimlamalarBundle:Birim')->find($birimid);


        $datatable = $this->get('app.datatable.sorubankasi.teoriksoru.liste');
        $datatable->buildDatatable();


        $datatable->getAjax()->set(array(
                'url' => $this->generateUrl('teoriksoru_results',array('birimid' => $birimid)),
                'type' => 'GET',
                'pipeline' => 0
            ));

        $datatable->getTopActions()->set(array(
            'start_html' => '<div class="row"><div class="col-sm-3">',
            'end_html' => '<p></p></div></div>',
            'actions' => array(
                array(
                    'route' => $this->generateUrl('teorik_soru__yeni',array('yeterlilikid' => $yeterlilikid,'birimid' => $birimid)),
                    'route_parameters' => array(
                        'yeterlilikid' => 'yeterlilikid',
                        'birimid' => 'birimid'

                    ),
                    'label' => "Yeni Soru",
                    'icon' => 'glyphicon glyphicon-plus',
                    'attributes' => array(
                        'rel' => 'tooltip',
                        'title' => "Yeni Soru",
                        'class' => 'btn btn-primary',
                        'role' => 'button'
                    ),
                )
            )
        ));

        return $this->render('liste.html.twig', array(
            'datatable' => $datatable,'title' => array('label' => 'Teorik Sorular'. ' / '.$birim->getYeterlilik()->getAd().' / '.$birim->getAd() ,'icon' => 'fa fa-list')
        ));
    }

    /**
     * @param integer $birimid
     *
     * @Route("/sorubankasi/teorik/liste//results/{birimid}", name="teoriksoru_results")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listeResultsAction($birimid)
    {
        $datatable = $this->get('app.datatable.sorubankasi.teoriksoru.liste');
        $datatable->buildDatatable();


        $query = $this->get('sg_datatables.query')->getQueryFrom($datatable);
        $query->buildQuery();

        $qb = $query->getQuery();
        $qb->andWhere("teorik_soru.birim = :b");
        $qb->setParameter('b',$birimid);
        $query->setQuery($qb);


        return $query->getResponse(false);

    }
}
