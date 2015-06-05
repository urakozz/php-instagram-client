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
use Instagram\Request\Subscription\GetSubscriptionsRequest;
use Instagram\Response\Comments\GetCommentsResponse;
use Instagram\Response\Likes\GetLikesResponse;
use Instagram\Response\Partials\Caption;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Partials\Subscription;
use Instagram\Response\Partials\UserInfo;
use Instagram\Response\Subscription\GetSubscriptionsResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class GetLikesTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testSelfFeedRequest()
    {
        $request = new GetLikesRequest();
        $request->setMediaId('999999537539417466_29586504');

        $this->assertSame([
            'media_id' => '999999537539417466_29586504',
        ], $request->getAttributes());
    }

    public function testMediaResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/likes.get.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var GetLikesResponse $response */
        $response = $client->call(new GetLikesRequest(['media_id' => '999999537539417466_29586504']));

        $this->assertInstanceOf(GetLikesResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());


        $this->assertEquals(120, $response->getData()->count());
        $user = $response->getData()->first();
        $this->assertInstanceOf(UserInfo::class, $user);
        $this->assertEquals("yanavladilenovna", $user->getUsername());
    }
}