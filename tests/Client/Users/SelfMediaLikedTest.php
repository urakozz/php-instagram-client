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
use Instagram\Request\Users\SelfMediaLikedRequest;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Users\SelfFeedResponse;
use Instagram\Response\Users\SelfMediaLikedResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class SelfMediaLikedTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;


    public function testSelfFeedRequest()
    {
        $request = new SelfMediaLikedRequest();
        $request->setCount(100);
        $request->setMaxLikeId('123');

        $this->assertSame([
            'count' => 100,
            'max_like_id' => '123'
        ], $request->getAttributes());
    }

    public function testMediaResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/users.selfMediaLiked.json"));

        $token  = "228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var SelfFeedResponse $response */
        $response = $client->call(new SelfMediaLikedRequest());

        $this->assertInstanceOf(SelfMediaLikedResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $this->assertEquals("999362055517011319_1651301566", $response->getPagination()->getNextMaxId());
        $this->assertContains("999362055517011319_1651301566", $response->getPagination()->getNextUrl());


        $media = $response->getData()->first();
        $this->assertEquals("999999537539417466_29586504", $media->getId());
        $this->assertEquals("999999538688656946", $media->getCaption()->getId());
    }
}