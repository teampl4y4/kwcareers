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

    /**
     * @param $applicantId
     * @Template()
     * @Route("/admin/callApplicant/{applicantId}", name="_kw_call_applicant")
     */
    public function callApplicantAction($applicantId)
    {
        return array();
    }
}
