<?php

namespace KellerWilliams\Bundle\SubscriptionBundle\Service;

use KellerWilliams\Bundle\CareersBundle\Entity;
use GuzzleHttp;
use KellerWilliams\Bundle\SubscriptionBundle\Entity\Subscription;
use Symfony\Component\Config\Definition\Exception\Exception;

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
            'form_params'   => ['customer' => $params],
            'auth'          => [$this->apiKey, 'x']
        ]);

        $body = json_decode($response->getBody());
        $mc->setChargifyId($body->customer->id);

        return $mc;
    }

    /**
     * @param Subscription $subscription
     * @return Subscription $subscription
     */
    public function addSubscription(Subscription $subscription)
    {

        $uri = '/subscriptions.' . $this->format;

        $params = array(
            'subscription' => [
                'product_handle'    => (string) $subscription->getChargifyProductId(),
                'customer_id'       => $subscription->getChargifyCustomerId(),
                'credit_card_attributes' => [
                            'full_number'        => (string) $subscription->getCreditcardNumber(),
                            'expiration_month'   => (string) $subscription->getExpirationMonth(),
                            'expiration_year'    => (string) $subscription->getExpirationYear()
        ]]);

        $response = null;

        try {
            $response = $this->client->post($uri, [
                'content-type' => 'application/json',
                'json' => $params,
                'auth' => [$this->apiKey, 'x']
            ]);
        } catch (Exception $e)
        {
            var_dump($e->getMessage());
            var_dump($response->getBody());
        }

        if($response->getStatusCode() != 201) {
            throw new Exception('Something went wrong creating a subscription');
        }

        return $subscription;

    }

}