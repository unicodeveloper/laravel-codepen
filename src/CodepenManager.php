<?php

namespace Unicodeveloper\Codepen;

use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;

class CodepenManager
{

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
     * Unofficial Codepen API
     * Source: http://cpv2api.com/
     * @var string
     */
    protected $baseUrl = 'http://cpv2api.com';

    public function __construct()
    {
        $this->setRequestOptions();
        $this->setResponse('/me');
    }

    /**
     * Set options for making the Client request
     * @return  void
     */
    private function setRequestOptions()
    {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
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
     * Set the url for getting the most popular pens
     * @return object
     */
    public function getMostPopularPens()
    {
        $this->setResponse('/pens/popular');

        return $this->data();
    }

    /**
     *  Get the details of the required request
     * @return object
     */
    private function data()
    {
        $result = json_decode($this->response->getBody());
        return $result->data;
    }
}