<?php

namespace SorubankasiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/sorubankasi")
     */
    public function indexAction()
    {
        return $this->render('SorubankasiBundle:Default:index.html.twig');
    }
}
