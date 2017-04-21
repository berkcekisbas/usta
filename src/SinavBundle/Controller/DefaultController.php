<?php

namespace SinavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/sinav")
     */
    public function indexAction()
    {
        return $this->render('SinavBundle:Default:index.html.twig');
    }
}
