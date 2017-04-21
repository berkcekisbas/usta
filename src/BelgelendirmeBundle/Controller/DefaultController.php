<?php

namespace BelgelendirmeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/belgelendirme")
     */
    public function indexAction()
    {
        return $this->render('BelgelendirmeBundle:Default:index.html.twig');
    }
}
