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

namespace Instagram\Tests\Client\Likes;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\AuthConfig;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Client\InstagramClientUnauthorized;
use Instagram\Request\Comments\GetCommentsRequest;
use Instagram\Request\Likes\GetLikesRequest;
use Instagram\Request\Media\GetMediaRequest;
use Instagram\Request\Media\GetMediaShortcodeRequest;
use Instagram\Request\Media\MediaPopularRequest;
use Instagram\Request\Media\MediaSearchRequest;
use Instagram\Request\Subscription\GetSubscriptionsRequest;
use Instagram\Response\Comments\GetCommentsResponse;
use Instagram\Response\Likes\GetLikesResponse;
use Instagram\Response\Media\GetMediaResponse;
use Instagram\Response\Media\ListMediaResponse;
use Instagram\Response\Partials\Caption;
use Instagram\Response\Partials\Media;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Partials\Subscription;
use Instagram\Response\Partials\UserInfo;
use Instagram\Response\Subscription\GetSubscriptionsResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class SearchMediaTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testMediaSearchRequest()
    {
        $request = new MediaSearchRequest();
        $request->setDistance(100);
        $request->setLat(1);
        $request->setLng(2);
        $request->setMaxTimestamp('123');
        $request->setMinTimestamp('100');

        $this->assertSame([
            'distance' => 100,
            'lat' => 1,
            'lng' => 2,
            'max_timestamp' => '123',
            'min_timestamp' => '100',
        ], $request->getAttributes());
    }

    public function testMediaSearchResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/users.userMediaRecent.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var ListMediaResponse $response */
        $response = $client->call(new MediaSearchRequest([]));

        $this->assertInstanceOf(ListMediaResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $this->assertInstanceOf(Media::class, $response->getData()->first());

    }

    public function testMediaPopularResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/users.userMediaRecent.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var ListMediaResponse $response */
        $response = $client->call(new MediaPopularRequest([]));

        $this->assertInstanceOf(ListMediaResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $this->assertInstanceOf(Media::class, $response->getData()->first());

    }


}