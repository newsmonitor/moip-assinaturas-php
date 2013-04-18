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
 * Moip Preferences
 *
 */
class Preferences
{
    private $repository;

    public function __construct(Moip $repository)
    {
        $this->repository = $repository;
    }
    public function retry($data)
    {
        return $this->repository->post("assinaturas/{$this->repository->apiVersion}/users/preferences/retry", null, $data);
    }
    public function others($data)
    {
        return $this->repository->post("assinaturas/{$this->repository->apiVersion}/users/preferences", null, $data);
    }


}