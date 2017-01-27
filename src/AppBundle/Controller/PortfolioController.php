<?php

namespace AppBundle\Controller;

use AppBundle\Form\CommentFormType;
use AppBundle\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

        $photos = $em->getRepository('AppBundle\Entity\Photo')
            ->findAll();


        return $this->render('AppBundle:portfolio:portfolio.html.twig', [
            'events' => $events,
            'photos' => $photos,
        ]);
    }

    /**
     * @Route("/show/{eventId}", name="single_event_show")
     */
    public function showAction($eventId, Request $request)
    {


        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('AppBundle\Entity\Event')
            ->findOneBy(['id' => $eventId]);

        $form = $this->createForm(CommentFormType::class);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();
            $comment->setEvent($event);

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Комментарий отправлен!');

            return $this->redirectToRoute('single_event_show', ['eventId'=>$eventId]);

        }

        return $this->render('AppBundle:portfolio:show.html.twig', [
            'event' => $event,
            'commentForm' => $form->createView()
        ]);
    }
}
