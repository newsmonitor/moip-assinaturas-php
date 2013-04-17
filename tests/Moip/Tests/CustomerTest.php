<?php
/**
 * This file is part of the Moip package.
 *
 * @author    Flávio Zantut <flavio@busk.com>
 *
 * @copyright 2013 spix discovery company (http://spixdiscovery.com/)
 */
use Moip\Customer;
use Moip\Moip;
use Mockery as m;
/**
 * Moip Tests
 *
 */
class MoipCustomerTest extends \Moip\Tests\TestCase
{

    public function testGetAllCustomers()
    {
        //$customer = New Customer('token', 'key');
        //$moip->customer->find(1);

    }

    public function testGetCustomerByCode()
    {
        $mock = m::mock('Moip\Moip');
        $mock->shouldReceive('get')->with("assinaturas/v1/customers/1")->andReturn(array());

        $customer = new Customer($mock);
        $this->assertInternalType('array',  $customer->find(1));
    }

}