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
use Instagram\Client\InstagramClientUnauthorized;
use Instagram\Request\Subscription\DeleteSubscriptionRequest;
use Instagram\Response\Subscription\DeleteSubscriptionResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class DeleteSubscriptionTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    protected $config;

    protected $jsonSuccess = '{"meta":{"code":200},"data":null}';

    public function setUp()
    {
        $this->config = new AuthConfig("d2cbeff4792242f7b49ea65f984a1237", "f95c2c4cd80348258685d04b68ce0b64", "http://192.168.50.50/auth");
    }

    public function testDeleteSubscriptionRequest()
    {
        $request = new DeleteSubscriptionRequest([
            'object' => 'all',
        ]);
        $this->assertSame(['object'=>'all'], $request->getAttributes());

        $request = new DeleteSubscriptionRequest();
        $request->setObject('all');
        $request->setId('123');
        $this->assertSame(['object'=>'all', 'id'=>'123'], $request->getAttributes());

    }

    public function testDeleteSubscriptionError()
    {
        $this->createHandlerForResponse(200, $this->jsonSuccess);

        $client = new InstagramClientUnauthorized($this->config, $this->getClient());
        /** @var DeleteSubscriptionResponse $response */
        $response = $client->call(new DeleteSubscriptionRequest([
            'object' => 'all',
        ]));

        $this->assertInstanceOf(DeleteSubscriptionResponse::class, $response);
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getData());

    }
}