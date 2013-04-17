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
 * Moip Customers
 *
 */
class Customer extends Moip
{
    public function all()
    {
        return $this->get("assinaturas/{$this->apiVersion}/customers")->json();
    }

    public function find($code)
    {
        return $this->get("assinaturas/{$this->apiVersion}/customers/{$code}")->json();
    }

}