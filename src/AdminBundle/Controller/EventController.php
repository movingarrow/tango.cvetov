<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 1/14/17
 * Time: 12:00 PM
 */

namespace AdminBundle\Controller;


use AdminBundle\Form\EventNewFormType;
use AdminBundle\Form\EventEditFormType;
use AppBundle\Entity\Event;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    /**
     * @Route("/event/new", name="admin_event_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(EventNewFormType::class);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $event = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            $this->addFlash('success', 'New Event was successfully created!');

            return $this->redirectToRoute('admin_event_list');
        }

        return $this->render('@Admin/Event/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/event/list", name="admin_event_list")
     */
    public function listAction()
    {

        $events = $this->getDoctrine()
            ->getRepository('AppBundle:Event')
            ->findAll();
        return $this->render('@Admin/Event/list.html.twig', array(
            'events' => $events
        ));
    }


    /**
     * @Route("event/{id}/edit", name="admin_event_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Event')->find($id);

        if (!$event) {
            throw $this->createNotFoundException('No event found for id '.$id);
        }

        $originalPhoto = new ArrayCollection();

        foreach ($event->getPhoto() as $photo) {
            $originalPhoto->add($photo);
        }

        $editForm = $this->createForm(EventEditFormType::class, $event);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            foreach ($originalPhoto as $photo) {
                if (false === $event->getPhoto()->contains($photo)) {

//                    $photo->getEvent()->removeElement($event);

                    $event->removePhoto($photo);

                    $em->persist($photo);
//                    $em->remove($photo);
                }
            }

            $em->persist($event);
            $em->flush();

            // redirect back to some edit page
            return $this->redirectToRoute('admin_event_list', array('id' => $id));
        }

        $form = $editForm;

        return $this->render('@Admin/Event/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("event/{id}/delete", name="admin_event_delete")
     */
    public function deleteAction(Request $request, Event $id)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Event')->find($id);
        if (!$event) {
            throw $this->createNotFoundException(
                'No comments found with id ' . $id
            );
        }

        $form = $this->createFormBuilder($event)
            ->add('delete', SubmitType::class, array(
                'attr' => array('class' => "btn btn-primary", 'style' => 'float: left; padding-left: 10px')))
            ->add('cancel', SubmitType::class, array(
                'attr' => array('value' => 'Cancel', 'class' => "btn btn-default", 'style' => 'float: left; padding-left: 10px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            if( isset($request->get('form')['cancel']) )
                return  $this->redirect($this->generateUrl('admin_event_list'));

            $em->remove($event);
            $em->flush();
            $this->addFlash('success', 'Event deleted successfully');

            return $this->redirectToRoute('admin_event_list');
        }


        return $this->render('@Admin/Event/delete.html.twig', [
            'deleteForm' => $form->createView()
        ]);
    }
}