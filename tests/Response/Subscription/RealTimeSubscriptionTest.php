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

namespace Instagram\Tests\Response\Subscription;


use Doctrine\Common\Collections\ArrayCollection;

class RealTimeSubscriptionTest extends \PHPUnit_Framework_TestCase
{

    public function testSettersGetters()
    {
        $response = new \Instagram\Response\Subscription\RealTimeSubscription();

        $response->setObject("user");
        $response->setChangedAspect("media");
        $response->setObjectId("11");
        $response->setData(new ArrayCollection());
        $response->setSubscriptionId("123");
        $response->setTime(123123123);

        $this->assertEquals("user", $response->getObject());
        $this->assertEquals("media", $response->getChangedAspect());
        $this->assertEquals("11", $response->getObjectId());
        $this->assertEquals("123", $response->getSubscriptionId());
        $this->assertEquals(123123123, $response->getTime());


    }
}