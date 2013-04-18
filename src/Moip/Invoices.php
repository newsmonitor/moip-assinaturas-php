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
 * Moip Invoices
 *
 */
class Invoices
{
    private $repository;

    public function __construct(Moip $repository)
    {
        $this->repository = $repository;
    }
    public function subscription($code)
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/subscriptions/{$code}/invoices");
    }

    public function find($code)
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/invoices/{$code}");
    }

    public function retry($code)
    {
        return $this->repository->post("assinaturas/{$this->repository->apiVersion}/invoices/{$code}/retry");
    }
}