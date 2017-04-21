<?php

namespace SikayetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/sikayet")
     */
    public function indexAction()
    {
        return $this->render('SikayetBundle:Default:index.html.twig');
    }
}
