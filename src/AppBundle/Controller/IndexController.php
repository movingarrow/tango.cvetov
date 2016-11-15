<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route(name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:index:index.html.twig');
    }
}
