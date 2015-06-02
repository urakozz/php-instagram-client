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

namespace Instagram\Tests\Client;


use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\RequestInterface;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Users\SelfFeedRequest;
use Instagram\Response\Users\SelfFeedResponse;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;

class InstagramClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Mockery\MockInterface | \GuzzleHttp\Client
     */
    protected $client;
    protected $config;

    protected $jsonError = '{"meta":{"error_type":"OAuthParameterException","code":400,"error_message":"The access_token provided is invalid."}}';

    public function setUp()
    {
        $this->client = \Mockery::mock('GuzzleHttp\Client[send]');
        $this->config = new TokenConfig("d2cbeff4792242f7b49ea65f984a1237");

    }

    public function testMediaResponseError()
    {
        $stream = new \GuzzleHttp\Stream\BufferStream();
        $stream->write($this->jsonError);
        $this->client->shouldReceive('send')->andReturnUsing(function(RequestInterface $request)use($stream){
            $response = new \GuzzleHttp\Message\Response(400);
            $response->setBody($stream);
            throw new RequestException($request, $request, $response);
        });

        $client = new InstagramClient($this->config, $this->client);
        /** @var SelfFeedResponse $response */
        $response = $client->call(new SelfFeedRequest());

        $this->assertInstanceOf(SelfFeedResponse::class, $response);
        $this->assertFalse($response->isOk());
        $this->assertEquals(400, $response->getCode());
        $this->assertEquals('OAuthParameterException', $response->getErrorType());
        $this->assertEquals('The access_token provided is invalid.', $response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
    }
}