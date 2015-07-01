<?php

namespace KellerWilliams\Bundle\CareersBundle\Controller;

use Doctrine\ORM\EntityManager;
use KellerWilliams\Bundle\CareersBundle\Entity\MarketCenter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MarketCenterController extends Controller
{
    /**
     * @Route("/market-center/{uid}", name="_kw_mc")
     * @Template()
     */
    public function viewAction($uid)
    {
        /** @var MarketCenter $em */
        $marketCenter = $this->getDoctrine()
                             ->getRepository('KellerWilliamsCareersBundle:MarketCenter')
                             ->findOneBy(array('uid' => $uid));

        if($marketCenter instanceof MarketCenter)
        {
            return array('mc' => $marketCenter);
        }

        throw new NotFoundHttpException('Market Center Not Found');

    }
}
