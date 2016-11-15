<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class PortfolioController extends Controller
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function indexAction()
    {
        return $this->render('portfolio.html.twig', array(

        ));
    }
}
