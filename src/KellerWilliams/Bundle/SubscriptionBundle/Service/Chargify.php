<?php

namespace KellerWilliams\Bundle\SubscriptionBundle\Service;

use KellerWilliams\Bundle\CareersBundle\Entity;
use GuzzleHttp;

class Chargify
{

    /**
     * @var API Key for Chargify
     */
    private $apiKey;

    /**
     * @var Base URL for API calls to Chargify
     */
    private $baseUrl;

    /**
     * @var string Format to return things from
     */
    private $format = 'json';

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    public function __construct($apiKey, $baseUrl, $format = 'json')
    {
        $this->apiKey   = $apiKey;
        $this->baseUrl  = $baseUrl;
        $this->format   = $format;
        $this->client  = new GuzzleHttp\Client(['base_uri' => $this->baseUrl]);
    }

    /**
     * @return API
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param API $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return Base
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param Base $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return array Array of stdObjects of Products from Chargify
     */
    public function getProducts()
    {
        $uri = '/products.' . $this->format;

        $response = $this->client->get($uri, ['auth' => [$this->apiKey, 'x']]);
        return json_decode($response->getBody());
    }

    /**
     * Creates a Customer in Chargify and return the MarketCenter entity with the Chargify customer ID
     * @param Entity\MarketCenter $mc
     * @return Entity\MarketCenter
     */
    public function addCustomerFromMarketCenter(Entity\MarketCenter $mc)
    {
        $uri = '/customers.' . $this->format;
        $params = array(
            'reference'     => $mc->getId(),
            'organization'  => $mc->getName(),
            'first_name'    => $mc->getPrincipleFirstName(),
            'last_name'     => $mc->getPrincipleLastName(),
            'email'         => $mc->getPrincipleEmail()

        );

        $response = $this->client->post($uri, [
            'form_params' => ['customer' => $params],
            'auth' => [$this->apiKey, 'x']
        ]);

        $body = json_decode($response->getBody());
        $mc->setChargifyId($body->customer->id);

        return $mc;
    }

    /**
     * @param Entity\MarketCenter $mc
     */
    public function addSubscription(Entity\MarketCenter $mc)
    {

    }

//CONTROLLER EXAMPLE
//$apiKey = 'i7vZvSpUhvO8yhpNti';
//$url    = 'https://kwcareers.chargify.com';
//
//$chargify = new Chargify($apiKey, $url);
//$chargify->addCustomerFromMarketCenter($marketCenter);
//
//$em = $this->get('doctrine')->getEntityManager();
//$em->persist($marketCenter);
//$em->flush();

}