<?php

namespace KellerWilliams\Bundle\CareersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class PlatformController extends Controller
{
    /**
     * @Route("/dashboard")
     */
    public function indexAction()
    {
        return new Response('Admin page!');
    }
}
