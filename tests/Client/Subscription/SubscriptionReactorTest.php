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

namespace Instagram\Tests\Client\Subscription;


use Instagram\Client\Config\AuthConfig;
use Instagram\Response\Subscription\RealTimeSubscription;
use Instagram\Client\SubscriptionReactor;

class SubscriptionReactorTest extends \PHPUnit_Framework_TestCase
{

    protected $json = '[{"changed_aspect": "media", "object": "user", "object_id": "228952246", "time": 1433103308, "subscription_id": 18295371, "data": {"media_id": "997265290610024404_228952246"}}]';

    protected $config;

    public function setUp()
    {
        $this->config = new AuthConfig("d2cbeff4792242f7b49ea65f984a1237", "f95c2c4cd80348258685d04b68ce0b64", "http://192.168.50.50/auth");

    }

    public function testSubscriptionReactor()
    {
        $reactor = new SubscriptionReactor($this->config);
        $reactor->process($this->json, "e1a87a2f9493201d521799e9235e3e42b0d97ef5");
    }

    public function testSubscriptionReactorFromHeaders()
    {
        $reactor = new SubscriptionReactor($this->config);
        $_SERVER['HTTP_X_HUB_SIGNATURE'] = "e1a87a2f9493201d521799e9235e3e42b0d97ef5";
        $reactor->process($this->json);
    }

    /**
     * Desc
     *
     * @return void
     * @expectedException \DomainException
     * @expectedExceptionText X-Hub-Signature and hmac digest did not match
     */
    public function testInvalidSignature()
    {
        $reactor = new SubscriptionReactor($this->config);
        $reactor->process($this->json, "e1a87a2f");
    }


    public function testCheckResponse()
    {
        $reactor = new SubscriptionReactor($this->config);
        $reactor->registerCallback("user", function(RealTimeSubscription $subscription){
            $this->assertEquals(0, $subscription->getCode());
            $this->assertEquals(0, $subscription->getErrorType());
            $this->assertEquals(0, $subscription->getErrorMessage());
            $this->assertTrue($subscription->isOk());
            $this->assertEquals("media", $subscription->getChangedAspect());
            $this->assertEquals("user", $subscription->getObject());
            $this->assertEquals("228952246", $subscription->getObjectId());
            $this->assertEquals(1433103308, $subscription->getTime());
            $this->assertEquals(18295371, $subscription->getSubscriptionId());
            $this->assertEquals("997265290610024404_228952246", $subscription->getData()->get('media_id'));
        });
        $reactor->process($this->json, "e1a87a2f9493201d521799e9235e3e42b0d97ef5");
    }
}