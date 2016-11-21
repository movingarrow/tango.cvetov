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

        $events = $em->getRepository('AppBundle\Entity\Event')
            ->findAll();

        #dump($events);die;

        return $this->render('AppBundle:portfolio:portfolio.html.twig', [
            'events' => $events
        ]);
    }

    /**
     * @Route("/show/{eventName}", name="single_event_show")
     */
    public function showAction($eventId)
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle\Entity\Event')
            ->findOneBy($eventId);

        return $this->render('AppBundle:portfolio:show.html.twig', [
            'events' => $events
        ]);
    }
}
