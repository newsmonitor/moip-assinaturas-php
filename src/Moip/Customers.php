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
class Customers
{
    private $repository;

    public function __construct(Moip $repository)
    {
        $this->repository = $repository;
    }
    public function all()
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/customers");
    }

    public function find($code)
    {
        return $this->repository->get("assinaturas/{$this->repository->apiVersion}/customers/{$code}");
    }

    public function add($data, $new_valt=false)
    {
        $new_valt = ($new_valt===false or $new_valt==='false')?'false':'true';
        return $this->repository->post("assinaturas/{$this->repository->apiVersion}/customers?new_vault={$new_valt}", null, $data);
    }

    public function update($data, $code)
    {
        return $this->repository->put("assinaturas/{$this->repository->apiVersion}/customers/{$code}", null, $data);
    }

    public function billingInfos($data, $code)
    {
        return $this->repository->put("assinaturas/{$this->repository->apiVersion}/customers/{$code}/billing_infos", null, $data);
    }

}