<?php
/**
 * PHP Version 5
 *
 * @category  H24
 * @package   H24
 * @author    "Yury Kozyrev" <yury.kozyrev@home24.de>
 * @copyright 2015 Home24 GmbH
 * @license   Proprietary license.
 * @link      http://www.home24.de
 */

namespace Instagram\Tests\Response\Partials;


use Instagram\Response\Partials\Subscription;

class SubscriptionTest extends \PHPUnit_Framework_TestCase{

    public function testSettersGetters(){

        $response = new Subscription();

        $response->setId("ID123");
        $response->setAspect("aspect");
        $response->setObject("object");
        $response->setObjectId(123);
        $response->setType("type");
        $response->setCallbackUrl("/path/to");

        $this->assertEquals("ID123", $response->getId());
        $this->assertEquals("aspect", $response->getAspect());
        $this->assertEquals("object", $response->getObject());
        $this->assertEquals(123, $response->getObjectId());
        $this->assertEquals("type", $response->getType());
        $this->assertEquals("/path/to", $response->getCallbackUrl());

    }
}