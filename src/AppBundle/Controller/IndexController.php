<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class IndexController extends Controller
{
    /**
     * @Route("", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle\Entity\Event')
            ->findAll();

        $comments = $em->getRepository('AppBundle\Entity\Comment')
            ->findAll();

        return $this->render('AppBundle:index:index.html.twig', [
            'events' => $events,
            'comments' => $comments,
        ]);
    }
}
