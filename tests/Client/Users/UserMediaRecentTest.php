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
use Instagram\Request\Users\UserMediaRecentRequest;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Users\SelfFeedResponse;
use Instagram\Response\Users\UserMediaRecentResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class UserMediaRecentTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;


    public function testUserMediaRecentRequest()
    {
        $request = new UserMediaRecentRequest();
        $request->setUserId(100);

        $this->assertSame([
            'user_id' => 100
        ], $request->getAttributes());
    }

    public function testMediaResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/users.userMediaRecent.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token));
        /** @var SelfFeedResponse $response */
        $response = $client->call(new UserMediaRecentRequest(['user_id'=>'228952246']));


        $this->assertInstanceOf(UserMediaRecentResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $this->assertEquals("968947474970648093_228952246", $response->getPagination()->getNextMaxId());
        $this->assertContains("968947474970648093_228952246", $response->getPagination()->getNextUrl());

        $media = $response->getData()->first();
        $this->assertEquals("996575240754765671", $media->getCaption()->getId());
    }
}