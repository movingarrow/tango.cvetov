<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 1/13/17
 * Time: 5:23 PM
 */

namespace AdminBundle\Controller;


use AdminBundle\Form\PhotoFormType;
use AdminBundle\Form\UploadPhotoType;
use AppBundle\Entity\Photo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class PhotoController extends Controller
{
    /**
     * @Route("/photo/list", name="admin_photo_list")
     */
    public function listAction()
    {

        $photos = $this->getDoctrine()
            ->getRepository('AppBundle:Photo')
            ->findAll();
        return $this->render('@Admin/Photo/list.html.twig', array(
            'photos' => $photos
        ));
    }

    /**
     * @Route("photo/{id}/edit", name="admin_photo_edit")
     */
    public function editAction(Request $request, Photo $photo)
    {
        $form = $this->createForm(PhotoFormType::class, $photo);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $photos = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($photos);
            $em->flush();
            $this->addFlash('success', 'Photo updated!');

            return $this->redirectToRoute('admin_photo_list');
        }

        return $this->render('@Admin/Photo/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("photo/{id}/delete", name="admin_photo_delete")
     */
    public function deleteAction(Request $request, Photo $id)
    {
        $em = $this->getDoctrine()->getManager();
        $photo = $em->getRepository('AppBundle:Photo')->find($id);
        if (!$photo) {
            throw $this->createNotFoundException(
                'No comments found with id ' . $id
            );
        }

        $form = $this->createFormBuilder($photo)
            ->add('delete', SubmitType::class, array(
                'attr' => array('class' => "btn btn-primary", 'style' => 'float: left; padding-left: 10px')))
            ->add('cancel', SubmitType::class, array(
                'attr' => array('value' => 'Cancel', 'class' => "btn btn-default", 'style' => 'float: left; padding-left: 10px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            if( isset($request->get('form')['cancel']) )
                return  $this->redirect($this->generateUrl('admin_photo_list'));

            $em->remove($photo);
            $em->flush();
            $this->addFlash('success', 'Photo deleted successfully');

            return $this->redirectToRoute('admin_photo_list');
        }


        return $this->render('@Admin/Photo/delete.html.twig', [
            'deleteForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/photo/upload", name="admin_photo_upload")
     */
    public function uploadAction(Request $request)
    {
        $photo = new Photo();
        $form = $this->createForm(UploadPhotoType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $photo->getName();
            $fileName = $this->get('app.photo_uploader')->upload($file);

            $photo->setName($fileName);


            return $this->redirect($this->generateUrl('admin_photo_list'));
        }

        return $this->render('@Admin/Photo/upload.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}