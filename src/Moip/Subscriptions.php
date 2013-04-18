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
 * Moip Subscriptions
 *
 */
class Subscriptions
{
    private $repository;

    public function __construct(Moip $repository)
    {
        $this->repository = $repository;
    }
    public function all()
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/subscriptions");
    }

    public function find($code)
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/subscriptions/{$code}");
    }

    public function add($data)
    {
        return $this->repository->post("assinaturas/{$this->repository->apiVersion}/subscriptions", null, $data);
    }

    public function update($data, $code)
    {
        return $this->repository->put("assinaturas/{$this->repository->apiVersion}/subscriptions/{$code}", null, $data);
    }

    public function suspend($code)
    {
        return $this->repository->put("assinaturas/{$this->repository->apiVersion}/subscriptions/{$code}/suspend");
    }

    public function activate($code)
    {
        return $this->repository->put("assinaturas/{$this->repository->apiVersion}/subscriptions/{$code}/activate");
    }
}