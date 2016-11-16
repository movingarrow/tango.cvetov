<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class PortfolioController extends Controller
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolioAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle\Entity\User')
            ->findAll();

        #dump($users);

        return $this->render('AppBundle:portfolio:portfolio.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/show", name="user_show")
     */
    public function showAction($userName)
    {

        return $this->render('AppBundle:portfolio:user.html.twig', [
            'users' => $users
        ]);
    }
}
