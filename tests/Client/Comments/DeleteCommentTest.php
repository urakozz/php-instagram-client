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

namespace Instagram\Tests\Client\Comments;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\AuthConfig;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Client\InstagramClientUnauthorized;
use Instagram\Request\Comments\DeleteCommentRequest;
use Instagram\Request\Comments\GetCommentsRequest;
use Instagram\Request\Comments\PostCommentRequest;
use Instagram\Request\Subscription\GetSubscriptionsRequest;
use Instagram\Response\Comments\DeleteCommentResponse;
use Instagram\Response\Comments\GetCommentsResponse;
use Instagram\Response\Comments\PostCommentResponse;
use Instagram\Response\Partials\Caption;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Partials\Subscription;
use Instagram\Response\Subscription\GetSubscriptionsResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class DeleteCommentTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testDeleteCommentRequest()
    {
        $request = new DeleteCommentRequest();
        $request->setMediaId('999999537539417466_29586504');
        $request->setCommentId('123');

        $this->assertSame([
            'media_id' => '999999537539417466_29586504',
            'comment_id' => '123',
        ], $request->getAttributes());
    }

    public function testDeleteCommentResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/comments.post.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var DeleteCommentResponse $response */
        $response = $client->call(new DeleteCommentRequest([
            'media_id' => '999999537539417466_29586504',
            'comment_id' => '123',
        ]));

        $this->assertInstanceOf(DeleteCommentResponse::class, $response);

        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertNull($response->getData());

    }
}