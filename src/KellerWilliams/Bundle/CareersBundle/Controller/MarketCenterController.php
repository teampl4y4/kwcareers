<?php

namespace KellerWilliams\Bundle\CareersBundle\Controller;

use Doctrine\ORM\EntityManager;
use KellerWilliams\Bundle\CareersBundle\Entity;
use KellerWilliams\Bundle\CareersBundle\Form;
use KellerWilliams\Bundle\CareersBundle\Service\Berke;
use KellerWilliams\Bundle\SubscriptionBundle\Service\Chargify;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use GuzzleHttp;

/**
 * Class MarketCenterController
 * @package KellerWilliams\Bundle\CareersBundle\Controller
 * @Route("/careers/office")
 */
class MarketCenterController extends Controller
{
    /**
     * @Route("/{uid}", name="_kw_mc")
     * @Template()
     */
    public function viewAction($uid)
    {
        $marketCenter = $this->getMarketCenterOffUid($uid);
        return array('mc' => $marketCenter);

    }

    /**
     * @param $uid
     * @Route("/{uid}/contact", name="_kw_mc_contact")
     * @Template()
     */
    public function contactAction($uid)
    {
        $marketCenter = $this->getMarketCenterOffUid($uid);
        return array('mc' => $marketCenter);
    }

    /**
     * @param $uid
     * @Route("/{uid}/events", name="_kw_mc_events")
     * @Template()
     */
    public function eventsAction($uid)
    {
        $marketCenter = $this->getMarketCenterOffUid($uid);
        return array('mc' => $marketCenter);
    }

    /**
     * @Route("/{uid}/apply", name="_kw_mc_apply")
     * @Template()
     */
    public function applyAction($uid)
    {
        /** @var Entity\MarketCenter $marketCenter */
        $marketCenter = $this->getMarketCenterOffUid($uid);

        $applicant = new Entity\Applicant();
        /** @var Form\Apply $form */
        $form = $this->get('form.factory')->create(new Form\Apply(), $applicant);
        $request = $this->get('request');

        $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->get('doctrine')->getEntityManager();

            $applicant->setMarketCenter($marketCenter);

            //Let's create a berke assessment and send the invitation to the candidate
            /** @var Berke $berke */
            $berke     = $this->get('kw.berke');
            $applicant = $berke->createAssessment($applicant);
            $berke->sendAssessmentInvite($applicant);

            $em->persist($applicant);
            $em->flush();

            return $this->redirect($this->generateUrl('_kw_mc_apply_thanks', array('uid' => $uid)));

        }

        return array('mc' => $marketCenter, 'form' => $form->createView());
    }

    /**
     * @Route("/{uid}/apply/thanks", name="_kw_mc_apply_thanks")
     * @Template()
     */
    public function applyThanksAction($uid)
    {
        $marketCenter = $this->getMarketCenterOffUid($uid);
        return array('mc' => $marketCenter);
    }

    private function getMarketCenterOffUid($uid)
    {
        /** @var MarketCenter $em */
        $marketCenter = $this->getDoctrine()
            ->getRepository('KellerWilliamsCareersBundle:MarketCenter')
            ->findOneBy(array('uid' => $uid));

        if($marketCenter instanceof Entity\MarketCenter)
        {
            return $marketCenter;
        }

        throw new NotFoundHttpException('Market Center Not Found');
    }
}
