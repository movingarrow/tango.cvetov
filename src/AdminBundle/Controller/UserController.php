<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 1/7/17
 * Time: 7:44 PM
 */

namespace AdminBundle\Controller;

use AdminBundle\Form\UserFormType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class UserController extends Controller
{
    /**
     * @Route("/user/list", name="admin_user_list")
     */
    public function listAction()
    {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        $deleteForms = array();
        foreach ($users as $user) {
            $deleteForms[$user->getId()] = $this->createDeleteForm($user->getId())->createView();
        }

        return $this->render('@Admin/User/list.html.twig', [
            'users' => $users,
            'deleteForms' => $deleteForms
        ]);
    }

    /**
     * @Route("/user/{id}/edit", name="admin_user_edit")
     */
    public function editAction(Request $request, User $user)
    {
        $form = $this->createForm(UserFormType::class, $user);

        // only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $users = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($users);
            $em->flush();
            $this->addFlash('success', 'User updated!');

            return $this->redirectToRoute('admin_user_list');
        }

        return $this->render('@Admin/User/edit.html.twig', [
            'userForm' => $form->createView()
        ]);
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/user/{id}/delete", name="admin_user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:User')->find($user);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_user_list'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete', 'attr' => array('style' => 'border:none;background:none;padding-left:0;color:black;')))
            ->getForm()
            ;
    }

}