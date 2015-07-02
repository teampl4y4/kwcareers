<?php

namespace KellerWilliams\Bundle\CareersBundle\Controller;

use Doctrine\ORM\EntityManager;
use KellerWilliams\Bundle\CareersBundle\Entity;
use KellerWilliams\Bundle\CareersBundle\Form;
use KellerWilliams\Bundle\CareersBundle\Service\Berke;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use GuzzleHttp;

class MarketCenterController extends Controller
{
    /**
     * @Route("/market-center/{uid}", name="_kw_mc")
     * @Template()
     */
    public function viewAction($uid)
    {
        $marketCenter = $this->getMarketCenterOffUid($uid);
        return array('mc' => $marketCenter);

    }

    /**
     * @Route("/market-center/{uid}/apply", name="_kw_mc_apply")
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

            $em->persist($applicant);
            $em->flush();

            return $this->redirect($this->generateUrl('_kw_mc_apply_thanks', array('uid' => $uid)));

        }

        return array('mc' => $marketCenter, 'form' => $form->createView());
    }

    /**
     * @Route("/market-center/{uid}/apply/thanks", name="_kw_mc_apply_thanks")
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
