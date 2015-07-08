<?php

namespace KellerWilliams\Bundle\CareersBundle\Controller;

use Doctrine\ORM\EntityManager;
use KellerWilliams\Bundle\SubscriptionBundle\Entity\Subscription;
use KellerWilliams\Bundle\SubscriptionBundle\Form\AddSubscription;
use KellerWilliams\Bundle\SubscriptionBundle\Service\Chargify;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use KellerWilliams\Bundle\CareersBundle\Entity;
use KellerWilliams\Bundle\CareersBundle\Form;
use GuzzleHttp;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PlatformController extends Controller
{

    const SESSION_MC_ID = 'mc.id';

    /**
     * @Route("/dashboard")
     */
    public function indexAction()
    {
        return new Response('Admin page!');
    }

    /**
     * @Template()
     * @Route("/register", name="_kw_mc_register")
     */
    public function registerAction()
    {
        $marketCenter = new Entity\MarketCenter();
        /** @var Form\Apply $form */
        $form       = $this->get('form.factory')->create(new Form\CreateMarketCenter(), $marketCenter);
        $request    = $this->get('request');

        $form->handleRequest($request);

        if ($form->isValid()) {

            //$url = '?key=&address=3008+cole+castle+lewisville+tx';
            $data = array(
                'key' => 'AIzaSyCtXKyFUqbWptlG7iFlRXcG8X8pWxRSqWg',
                'address' => $marketCenter->getAddress() . ' ' . $marketCenter->getZip()
            );

            $client     = new GuzzleHttp\Client();
            $response   = $client->get('https://maps.googleapis.com/maps/api/geocode/json', ['query' => $data]);

            $address    = json_decode($response->getBody())->results[0];

            foreach($address->address_components as $component) {
                switch($component->types[0]) {

                    //set city
                    case 'locality':
                        $marketCenter->setCity($component->long_name);
                        break;

                    //set state
                    case 'administrative_area_level_1':
                        $marketCenter->setState($component->long_name);
                        break;

                    //set country
                    case 'country':
                        $marketCenter->setCountry($component->long_name);
                        break;
                }
            }

            $marketCenter->setAddressLine($address->formatted_address);

            $marketCenter->setLat($address->geometry->location->lat);
            $marketCenter->setLng($address->geometry->location->lng);

            /** @var EntityManager $em */
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($marketCenter);

            /** @var Chargify $chargify */
            $chargify = $this->get('kw.chargify');
            $marketCenter = $chargify->addCustomerFromMarketCenter($marketCenter);

            $em->persist($marketCenter);
            $em->flush();

            $this->get('session')->set(self::SESSION_MC_ID, $marketCenter->getId());

            return $this->redirect($this->generateUrl('_kw_mc_payment'));

        }

        return array('form' => $form->createView());
    }

    /**
     * @param $id
     * @Template()
     * @Route("/register/payment", name="_kw_mc_payment")
     */
    public function paymentAction()
    {
        /** @var Entity\MarketCenter $marketCenter */
        $marketCenter = $this->getMarketCenterOffId( $this->get('session')->get(self::SESSION_MC_ID) );

        $subscription = new Subscription();
        $subscription->setChargifyCustomerId( $marketCenter->getChargifyId() );
        $subscription->setChargifyProductId( $this->container->getParameter('chargify_main_product_handle') );

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($subscription);

        /** @var AddSubscription $form */
        $form = $this->get('form.factory')->create(new AddSubscription(), $subscription);
        $request = $this->get('request');

        $form->handleRequest($request);
        if ($form->isValid()) {

            /** @var Chargify $chargify */
            $chargify = $this->get('kw.chargify');
            $chargify->addSubscription($subscription);

            //Mask CC number in DB except for last 4 digits
            $subscription->setCreditcardNumber($this->maskCreditCard($subscription->getCreditcardNumber()));

            $em->persist($subscription);
            $em->flush();

            //take them to their new Market Center Page
            return $this->redirect($this->generateUrl('_kw_mc', array('uid' => $marketCenter->getUid() )));
        }

        return array('form' => $form->createView());
    }

    private function getMarketCenterOffId($uid)
    {
        /** @var MarketCenter $em */
        $marketCenter = $this->getDoctrine()
            ->getRepository('KellerWilliamsCareersBundle:MarketCenter')
            ->findOneBy(array('id' => $uid));

        if($marketCenter instanceof Entity\MarketCenter)
        {
            return $marketCenter;
        }

        throw new NotFoundHttpException('Market Center Not Found');
    }

    private function maskCreditCard($number) {
        if(strlen($number) > 8) {
            return substr($number, 0, 4) . str_repeat("X", strlen($number) - 8) . substr($number, -4);
        }

        return $number;
    }
}
