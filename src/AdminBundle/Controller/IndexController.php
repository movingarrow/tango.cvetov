<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 1/4/17
 * Time: 10:24 PM
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class IndexController extends Controller
{
    /**
     * @Route("", name="admin_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle\Entity\Event')
            ->findAll();


        return $this->render('AdminBundle:Index:index.html.twig', [
            'events' => $events
        ]);
    }
}
