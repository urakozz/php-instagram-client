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


use GuzzleHttp\Exception\RequestException;
use Instagram\Client\Config\AuthConfig;
use Instagram\Client\InstagramClientUnauthorized;
use Instagram\Request\Subscription\CreateSubscriptionRequest;
use Instagram\Response\Partials\Subscription;
use Instagram\Response\Subscription\CreateSubscriptionResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class CreateSubscriptionTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    protected $config;

    protected $jsonSuccess = '{"meta":{"code":200},"data":{"object":"user","object_id":null,"aspect":"media","callback_url":"http:\/\/staging.i.urakozz.me\/callback\/users","type":"subscription","id":"18423900"}}';
    protected $jsonError   = '{"meta":{"error_type":"APISubscriptionError","code":400,"error_message":"Invalid response"}}';

    public function setUp()
    {
        $this->config = new AuthConfig("d2cbeff4792242f7b49ea65f984a1237", "f95c2c4cd80348258685d04b68ce0b64", "http://192.168.50.50/auth");


    }

    public function testCreateSubscriptionRequest()
    {
        $request = new CreateSubscriptionRequest();
        $request->setObject('geography');
        $request->setAspect('media');
        $request->setLat(35.657872);
        $request->setLng(139.70232);
        $request->setRadius(100);
        $request->setCallbackUrl("http://localhost");
        $request->setVerifyToken('token');
        $this->assertSame([
            'object' => 'geography',
            'aspect' => 'media',
            'lat' => 35.657872,
            'lng' => 139.70232,
            'radius' => 100,
            'callback_url' => 'http://localhost',
            'verify_token' => 'token',
        ], $request->getAttributes());

        $request = new CreateSubscriptionRequest();
        $request->setObject('tag');
        $request->setObjectId('nofilter');
        $request->setAspect('media');
        $request->setCallbackUrl("http://localhost");
        $request->setVerifyToken('token');
        $this->assertSame([
            'object' => 'tag',
            'object_id' => 'nofilter',
            'aspect' => 'media',
            'callback_url' => 'http://localhost',
            'verify_token' => 'token',
        ], $request->getAttributes());

        $request = new CreateSubscriptionRequest([
            'object' => 'user',
            'aspect' => 'media',
            'callback_url' => 'http://staging.i.urakozz.me/callback/users'
        ]);

        $this->assertSame([
            'object' => 'user',
            'aspect' => 'media',
            'callback_url' => 'http://staging.i.urakozz.me/callback/users'
        ], $request->getAttributes());

    }

    public function testCreateSubscriptionSuccess()
    {
        $this->createHandlerForResponse(200, $this->jsonSuccess);

        $client = new InstagramClientUnauthorized($this->config, $this->getClient());
        /** @var CreateSubscriptionResponse $response */
        $response = $client->call(new CreateSubscriptionRequest([
            'object' => 'user',
            'aspect' => 'media',
            'callback_url' => 'http://staging.i.urakozz.me/callback/users'
        ]));
        $this->assertInstanceOf(CreateSubscriptionResponse::class, $response);
        $this->assertEquals(200, $response->getCode());
        $this->assertInstanceOf(Subscription::class, $response->getData());
        $this->assertNull($response->getData()->getObjectId());
        $this->assertEquals("user", $response->getData()->getObject());
        $this->assertEquals("media", $response->getData()->getAspect());
        $this->assertEquals("http://staging.i.urakozz.me/callback/users", $response->getData()->getCallbackUrl());
        $this->assertEquals("18423900", $response->getData()->getId());

    }

    public function testCreateSubscriptionError()
    {
        $this->createHandlerForResponse(400, $this->jsonError);

        $client = new InstagramClientUnauthorized($this->config, $this->getClient());
        /** @var CreateSubscriptionResponse $response */
        $response = $client->call(new CreateSubscriptionRequest([
            'object' => 'user',
            'aspect' => 'media',
            'callback_url' => 'http://staging.i.urakozz.me/callback/users'
        ]));
        $this->assertInstanceOf(CreateSubscriptionResponse::class, $response);
        $this->assertEquals(400, $response->getCode());
        $this->assertNull($response->getData());

    }
}