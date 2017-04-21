<?php

namespace DokumanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/dokuman")
     */
    public function indexAction()
    {
        return $this->render('DokumanBundle:Default:index.html.twig');
    }
}
