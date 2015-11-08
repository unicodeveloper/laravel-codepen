<?php

namespace Unicodeveloper\Codepen;

use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;

class CodepenManager
{
    /**
     * Self-issued token from your Medium Profile Settings Page
     * @var mixed
     */
    protected $integrationToken;

    /**
     * [$client description]
     * @var [type]
     */
    protected $client;

    /**
     * [$response description]
     * @var [type]
     */
    protected $response;

    /**
     * [$baseUrl description]
     * @var string
     */
    protected $baseUrl = 'https://api.medium.com/v1';

    public function __construct()
    {
        $this->setToken();
        $this->setRequestOptions();
        $this->setResponse('/me');
    }

    /**
     * Get token from config file
     * @return  void
     */
    public function setToken()
    {
        $this->integrationToken = Config::get('medium.integrationToken');
    }

    /**
     * Set options for making the Client request
     * @return  void
     */
    private function setRequestOptions()
    {
        $authBearer = 'Bearer' . ' ' . $this->integrationToken;

        $this->client = new Client(['base_uri' => $this->baseUrl]);

        // Set a single header using path syntax
        $this->client->setDefaultOption('headers/Authorization', $authBearer);
    }

    /**
     * Make the client request and get the response
     * @param string $relativeUrl
     * @return  void
     */
    public function setResponse($relativeUrl)
    {
        $this->response = $this->client->get($this->baseUrl . $relativeUrl, []);
    }

    /**
     * Set the url for getting the personal detail
     * @return object
     */
    public function me()
    {
        $this->setResponse('/me');

        return $this->data();
    }

    /**
     *  Get the personal details of the Medium user
     * @return object
     */
    private function data()
    {
        $result = json_decode($this->response->getBody());
        return $result->data;
    }
}