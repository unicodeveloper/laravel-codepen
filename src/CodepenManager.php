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
     * Get the latest Picked Pens - Fetches 12 results
     * @return array
     */
    public function getLatestPickedPens()
    {
        $this->setResponse('/pens/picks');

        return $this->data();
    }

    /**
     * Get the most recently created pens - Fetches 12 results
     * @return array
     */
    public function getRecentlyCreatedPens()
    {
        $this->setResponse('/pens/recent');

        return $this->data();
    }

    /**
     * Get the profile of a Codepen User
     * @param  $username
     * @return object
     */
    public function getProfile($username)
    {
        $this->setResponse('/profile/' . $username);

        return $this->data();
    }

    /**
     * Get a user's loved posts
     * @param  $username
     * @return array
     */
    public function getLovedPosts($username)
    {
        $this->setResponse('/posts/loved/' . $username);

        return $this->data();
    }

    /**
     * Get a user's popular posts
     * @param  $username
     * @return array
     */
    public function getPopularPosts($username)
    {
        $this->setResponse('/posts/popular/' . $username);

        return $this->data();
    }

    /**
     * Get a user's published posts
     * @param  $username
     * @return array
     */
    public function getPublishedPosts($username)
    {
        $this->setResponse('/posts/published/' . $username);

        return $this->data();
    }

    /**
     * Get a user's loved pens
     * @param  $username
     * @return array
     */
    public function getLovedPens($username)
    {
        $this->setResponse('/pens/loved/' . $username);

        return $this->data();
    }

    /**
     * Get a user's popular pens
     * @param  $username
     * @return array
     */
    public function getPopularPens($username)
    {
        $this->setResponse('/pens/popular/' . $username);

        return $this->data();
    }

    /**
     * Get a user's public pens
     * @param  $username
     * @return array
     */
    public function getPublicPens($username)
    {
        $this->setResponse('/pens/public/' . $username);

        return $this->data();
    }

    /**
     * Get a user's forked pens
     * @param  $username
     * @return array
     */
    public function getForkedPens($username)
    {
        $this->setResponse('/pens/forked/' . $username);

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