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
use Symfony\Component\HttpFoundation\Request;

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
            'commentForm' => $form->createView()
        ]);
    }
}