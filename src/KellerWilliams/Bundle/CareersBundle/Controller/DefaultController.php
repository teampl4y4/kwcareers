<?php

namespace KellerWilliams\Bundle\CareersBundle\Controller;

use KellerWilliams\Bundle\CareersBundle\Entity\MarketCenter;
use KellerWilliams\Bundle\CareersBundle\Entity\MarketCenterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    const CENTERS_NEAR_ME = '_kw_mcs_nearMe';

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
        //grab this from session if we can..
        $marketCenters = $this->get('session')->get(self::CENTERS_NEAR_ME);
        return array('marketCenters' => json_encode($marketCenters));
    }

    /**
     * @Route("/api/get-gps", name="_kw_api_gps")
     */
    public function userGpsAction()
    {

        /** @var Request $request */
        $request = $this->container->get('request_stack')->getCurrentRequest();

        $lat    = $request->get('lat');
        $lng    = $request->get('lng');
        $radius = $request->get('radius');

        if(!is_numeric($radius)) {
            $radius = 200;
        }

        /** @var MarketCenterRepository $marketCenterRepo */
        $marketCenterRepo = $this->getDoctrine()
            ->getRepository('KellerWilliamsCareersBundle:MarketCenter');

        $marketCenters = $marketCenterRepo->findNearLatLng($lat, $lng, $radius);

        $this->get('session')->set(self::CENTERS_NEAR_ME, $marketCenters);
        return new JsonResponse($marketCenters);
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
