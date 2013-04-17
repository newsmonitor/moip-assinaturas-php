<?php
/**
 * This file is part of the Moip package.
 *
 * @author    Flávio Zantut <flavio@busk.com>
 *
 * @copyright 2013 spix discovery company (http://spixdiscovery.com/)
 */
namespace Moip;
use Guzzle\Http\Client;
use Guzzle\Plugin\CurlAuth\CurlAuthPlugin;
/**
 * Moip Plans
 *
 */
class Moip
{
    public $apiUrl = 'https://sandbox.moip.com.br';
    public $apiVersion = 'v1';

    private $client;

    public function __construct($user, $pass)
    {
        $this->client = new Client($this->apiUrl);
        // Add the auth plugin to the client object
        $authPlugin = new CurlAuthPlugin($user, $pass);
        $this->client->addSubscriber($authPlugin);
    }

    public function client()
    {
        return $this->client;
    }

    public function __call($method, $arguments)
    {
        if(preg_match('/^get|post|put|patch|delete|head|options|link|unlink|purge$/i', $method)) {
            $call = call_user_func_array (array($this->client(), $method) , $arguments);
            return $call->send();
        }

    }



}