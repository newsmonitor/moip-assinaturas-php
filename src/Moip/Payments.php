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
 * Moip Payments
 *
 */
class Payments
{
    private $repository;

    public function __construct(Moip $repository)
    {
        $this->repository = $repository;
    }
    public function invoice($code)
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/invoices/{$code}/payments");
    }

    public function find($code)
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/payments/{$code}");
    }
}