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


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Subscription\GetSubscriptionsRequest;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Partials\Subscription;
use Instagram\Response\Subscription\GetSubscriptionsResponse;

class GetSubscriptionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Mockery\MockInterface | \GuzzleHttp\Client
     */
    protected $client;

    public function setUp()
    {
        $this->client = \Mockery::mock('GuzzleHttp\Client[send]');

    }

    public function testMediaResponse()
    {
        $stream = new \GuzzleHttp\Stream\BufferStream();
        $stream->write(file_get_contents(__DIR__."/../fixtures/subscription.getSubscriptions.json"));
        $this->client->shouldReceive('send')->andReturn(new \GuzzleHttp\Message\Response(200, [], $stream));

        $token = "228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82";
        $client = new InstagramClient(new TokenConfig($token), $this->client);
        /** @var GetSubscriptionsResponse $response */
        $response = $client->call(new GetSubscriptionsRequest());

        $this->assertInstanceOf(GetSubscriptionsResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());
        $subscriptions = $response->getData();
        $this->assertEquals(1, $subscriptions->count());
        $subscription = $subscriptions->first();
        $this->assertInstanceOf(Subscription::class, $subscription);
        $this->assertEquals("18315139", $subscription->getId());
        $this->assertEquals("subscription", $subscription->getType());
        $this->assertEquals("user", $subscription->getObject());
        $this->assertEquals("media", $subscription->getAspect());
        $this->assertEquals("http://staging.i.urakozz.me/callback/users", $subscription->getCallbackUrl());


    }
}