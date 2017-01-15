<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 1/9/17
 * Time: 10:51 PM
 */

namespace AdminBundle\Controller;


use AdminBundle\Form\CommentFormType;
use AppBundle\Entity\Comment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class CommentController extends Controller
{
    /**
     * @Route("/comment/list", name="admin_comment_list")
     */
    public function listAction()
    {

        $comments = $this->getDoctrine()
            ->getRepository('AppBundle:Comment')
            ->findAll();
        return $this->render('@Admin/Comment/list.html.twig', array(
            'comments' => $comments
        ));
    }

    /**
     * @Route("comment/{id}/edit", name="admin_comment_edit")
     */
    public function editAction(Request $request, Comment $comment)
    {
        $form = $this->createForm(CommentFormType::class, $comment);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comments = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($comments);
            $em->flush();
            $this->addFlash('success', 'Comment updated!');

            return $this->redirectToRoute('admin_comment_list');
        }

        return $this->render('@Admin/Comment/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("comment/{id}/delete", name="admin_comment_delete")
     */
    public function deleteAction(Request $request, Comment $id)
    {
        $em = $this->getDoctrine()->getManager();
        $comment = $em->getRepository('AppBundle:Comment')->find($id);
        if (!$comment) {
            throw $this->createNotFoundException(
                'No comments found with id ' . $id
            );
        }

        $form = $this->createFormBuilder($comment)
            ->add('delete', SubmitType::class, array(
                'attr' => array('class' => "btn btn-primary", 'style' => 'float: left; padding-left: 10px')))
            ->add('cancel', SubmitType::class, array(
                'attr' => array('value' => 'Cancel', 'class' => "btn btn-default", 'style' => 'float: left; padding-left: 10px')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            if( isset($request->get('form')['cancel']) )
                return  $this->redirect($this->generateUrl('admin_comment_list'));

            $em->remove($comment);
            $em->flush();
            $this->addFlash('success', 'Comment deleted successfully');

            return $this->redirectToRoute('admin_comment_list');
        }


        return $this->render('@Admin/Comment/delete.html.twig', [
            'deleteForm' => $form->createView()
        ]);
    }
}