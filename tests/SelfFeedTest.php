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

namespace Instagram\Tests;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Users\SelfFeedRequest;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Users\SelfFeed;

class SelfFeedTest extends \PHPUnit_Framework_TestCase
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
        $stream->write(file_get_contents("tests/fixtures/usersSelfFeed.json"));
        $this->client->shouldReceive('send')->andReturn(new \GuzzleHttp\Message\Response(200, [], $stream));

        $token = "228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82";
        $client = new InstagramClient(new TokenConfig($token), $this->client);
        /** @var SelfFeed $response */
        $response = $client->call(new SelfFeedRequest());

        $this->assertInstanceOf(SelfFeed::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $this->assertEquals("984773301862532202_327064992", $response->getPagination()->getNextMaxId());
        $this->assertContains("984773301862532202_327064992", $response->getPagination()->getNextUrl());
    }
}