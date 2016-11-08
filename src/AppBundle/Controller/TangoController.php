<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class TangoController
{
    /**
     * @Route("/tango")
     */
    public function showAction()
    {
        return new Response('It\'s working!');
    }


}