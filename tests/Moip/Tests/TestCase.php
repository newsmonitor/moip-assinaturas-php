<?php
/**
 * This file is part of the Moip package.
 *
 * @author    Flávio Zantut <flavio@busk.com>
 *
 * @copyright 2013 spix discovery company (http://spixdiscovery.com/)
 */
namespace Moip\Tests;
use \Mockery as m;
/**
 * Base for all Tests
 *
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
     public function tearDown()
    {
        m::close();
    }


}