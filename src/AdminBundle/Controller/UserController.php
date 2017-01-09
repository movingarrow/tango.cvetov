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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

        return $this->render('@Admin/User/list.html.twig', [
            'users' => $users,
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
}