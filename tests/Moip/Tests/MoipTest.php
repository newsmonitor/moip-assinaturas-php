<?php
/**
 * This file is part of the Moip package.
 *
 * @author    Flávio Zantut <flavio@busk.com>
 *
 * @copyright 2013 spix discovery company (http://spixdiscovery.com/)
 */
use Moip\Moip;
/**
 * Moip Tests
 *
 */
class MoipTest extends \Moip\Tests\TestCase
{
    /**
     * Test Call
     *
     */
    public function testMoipCall()
    {
        $moip = New Moip('user', 'pass');
        $this->assertEquals('Guzzle\Http\Message\Response', get_class($moip->get()));
    }

}