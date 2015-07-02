<?php

namespace KellerWilliams\Bundle\CareersBundle\Service;

use KellerWilliams\Bundle\CareersBundle\Entity;
use GuzzleHttp;

class Berke
{

    /**
     * @var API Key mapping to Berke
     */
    private $apiKey;

    /**
     * @var Base URL for Berke API
     */
    private $baseUrl;

    /**
     * @var the format we want the response to be
     */
    private $format;

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    public function __construct($apiKey, $baseUrl, $format)
    {
        $this->apiKey  = $apiKey;
        $this->baseUrl = $baseUrl;
        $this->format  = $format;
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
     * Creates an Assessment on Berke
     * @param Entity\Applicant $applicant
     * @return Entity\Applicant Updated Applicant Entity with Berke identifiers
     */
    public function createAssessment(Entity\Applicant $applicant)
    {
        $berkeUrl = $this->baseUrl . '/CreateAssessment';
        $berkeParams = array(
            'apiToken'      => $this->apiKey,
            'firstName'     => $applicant->getFirstName(),
            'lastName'      => $applicant->getLastName(),
            'emailAddress'  => $applicant->getEmail(),
            'formatOutput'  => $this->format
        );

        //post to berke to create an assessment
        $response = $this->client->post($berkeUrl, ['form_params' => $berkeParams]);

        $body = json_decode($response->getBody());

        $applicant->setBerkeSourceCandidateId($body->assessment->sourceCandidateId);
        $applicant->setAssessmentUrl($body->assessment->assessmentUrl);

        return $applicant;
    }

    public function sendAssessmentInvite(Entity\Applicant $applicant)
    {
        $url      = $this->baseUrl . '/SendInvitation';
        $response = $this->client->post($url,  ['form_params' =>array(
            'apiToken'          => $this->apiKey,
            'sourceCandidateId' => $applicant->getBerkeSourceCandidateId(),
            'emailAddress'      => $applicant->getEmail(),
            'formatOutput'      => $this->format
        )]);

        if($response->getStatusCode() != 200) {
            throw new Exception('Something went wrong.');
        }

        return $response;
    }

    /**
     * Example code for a controller
     */

    //Let's create a berke assessment and send the invitation to the candidate
    /** @var Berke $berke */
    //$berke     = $this->get('kw.berke');
    //$applicant = $berke->createAssessment($applicant);
    //$berke->sendAssessmentInvite($applicant);

}