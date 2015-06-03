<?php
/**
 * PHP Version 5
 *
 * @package
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */

namespace Instagram\Tests\Client\Users;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Users\SelfFeedRequest;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Users\SelfFeedResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class SelfFeedTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;


    public function testSelfFeedRequest()
    {
        $request = new SelfFeedRequest();
        $request->setCount(100);
        $request->setMaxId('123qwe');
        $request->setMinId('100qwe');

        $this->assertSame([
            'count' => 100,
            'max_id' => '123qwe',
            'min_id' => '100qwe'
        ], $request->getAttributes());
    }

    public function testMediaResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/usersSelfFeed.json"));

        $token  = "228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var SelfFeedResponse $response */
        $response = $client->call(new SelfFeedRequest());

        $this->assertInstanceOf(SelfFeedResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $this->assertEquals("984773301862532202_327064992", $response->getPagination()->getNextMaxId());
        $this->assertContains("984773301862532202_327064992", $response->getPagination()->getNextUrl());

        $media = $response->getData()->first();
        $this->assertEquals("38615182", $media->getUser()->getId());
    }
}