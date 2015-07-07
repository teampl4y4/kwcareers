<?php

namespace KellerWilliams\Bundle\CareersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_home")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'Josh');
    }

    /**
     * @Route("/find-office", name="_kw_find_office")
     * @Template()
     */
    public function findOfficeAction()
    {

        //TODO -- need to make this actually work
        /** @var MarketCenter $em */
        $marketCenter = $this->getDoctrine()
            ->getRepository('KellerWilliamsCareersBundle:MarketCenter')
            ->findOneBy(array('uid' => 7341608));

        return array('marketCenter' => $marketCenter);
    }

    /**
     * @Route("/news", name="_kw_news")
     * @Template()
     */
    public function newsAction()
    {
        return array();
    }

}
