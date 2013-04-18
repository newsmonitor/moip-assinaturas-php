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
 * Moip
 *
 */
class Moip
{
    protected $apiUrl = '';
    public $apiVersion = 'v1';

    protected $client;

    public function __construct($user, $pass, $env = 'sandbox')
    {
        if($env) {
            $this->apiUrl = "https://{$env}.moip.com.br";
        }
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
        if(preg_match('/^get|post|put|delete$/i', $method)) {
            $call = call_user_func_array (array($this->client(), $method) , $arguments);
            $call = $call->send();
            try {
                $response = json_decode(json_encode($call->json()));
            } catch (\Guzzle\Common\Exception\RuntimeException $e) {
                $response =  $call->getBody();
            }
            return $response;

        }

    }
}