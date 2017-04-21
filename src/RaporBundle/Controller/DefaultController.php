<?php

namespace RaporBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/rapor")
     */
    public function indexAction()
    {
        return $this->render('RaporBundle:Default:index.html.twig');
    }
}
