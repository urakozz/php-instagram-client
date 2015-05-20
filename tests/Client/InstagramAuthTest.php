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


use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\RequestInterface;
use Instagram\Client\Config\AuthConfig;
use Instagram\Client\InstagramAuth;
use Instagram\Response\OAuth\OAuthResponse;
use Instagram\Response\Partials\UserInfo;

class InstagramAuthTest extends \PHPUnit_Framework_TestCase
{
    protected $config;

    /**
     * @var \Mockery\MockInterface | \GuzzleHttp\Client
     */
    protected $client;

    protected $errorJson   = '{"code": 400, "error_type": "OAuthException", "error_message": "No matching code found."}';
    protected $successJson = '{"access_token":"228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82","user":{"username":"urakozz","bio":"Senior Software Engineer, Home24 GmbH","website":"http:\/\/home24.de","profile_picture":"https:\/\/instagramimages-a.akamaihd.net\/profiles\/profile_228952246_75sq_1398293168.jpg","full_name":"Yury Kozyrev","id":"228952246"}}';

    public function setUp()
    {
        $this->config = new AuthConfig("d2cbeff4792242f7b49ea65f984a1237", "f95c2c4cd80348258685d04b68ce0b64", "http://192.168.50.50/auth");
        $this->client = \Mockery::mock('GuzzleHttp\Client[send]');
    }

    public function testGetLink()
    {
        $auth = new InstagramAuth($this->config);
        $url  = $auth->getOAuthUrl();
        $this->assertEquals(
            'https://api.instagram.com/oauth/authorize/?client_id=d2cbeff4792242f7b49ea65f984a1237&response_type=code&redirect_uri=http%3A%2F%2F192.168.50.50%2Fauth&scopes=basic',
            $url);
    }

    public function testTokenError()
    {
        $stream = new \GuzzleHttp\Stream\BufferStream();
        $stream->write($this->errorJson);
        $this->client->shouldReceive('send')->andReturn(new \GuzzleHttp\Message\Response(400, [], $stream));

        $auth = new InstagramAuth($this->config, $this->client);
        $resp = $auth->retrieveOAuthToken(md5("random"));

        $this->assertInstanceOf(OAuthResponse::class, $resp);

        $this->assertFalse($resp->isOk());
        $this->assertEquals(400, $resp->getCode());
        $this->assertEquals("OAuthException", $resp->getErrorType());
        $this->assertEquals("No matching code found.", $resp->getErrorMessage());

        $this->assertNull($resp->getUser());
        $this->assertNull($resp->getAccessToken());
    }

    public function testTokenSuccess()
    {
        $stream = new \GuzzleHttp\Stream\BufferStream();
        $stream->write($this->successJson);
        $this->client->shouldReceive('send')->andReturn(new \GuzzleHttp\Message\Response(400, [], $stream));

        $auth = new InstagramAuth($this->config, $this->client);
        $resp = $auth->retrieveOAuthToken(md5("random"));

        $this->assertInstanceOf(OAuthResponse::class, $resp);
        $this->assertTrue($resp->isOk());
        $this->assertEquals(0, $resp->getCode());
        $this->assertNull($resp->getErrorType());
        $this->assertNull($resp->getErrorMessage());
        $this->assertNotNull($resp->getUser());
        $this->assertNotNull($resp->getAccessToken());
        $this->assertEquals("228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82", $resp->getAccessToken());
        $this->assertInstanceOf(UserInfo::class, $resp->getUser());
        $this->assertEquals("urakozz", $resp->getUser()->getUsername());
        $this->assertEquals("228952246", $resp->getUser()->getId());
        $this->assertEquals("Yury Kozyrev", $resp->getUser()->getFullName());
        $this->assertEquals("https://instagramimages-a.akamaihd.net/profiles/profile_228952246_75sq_1398293168.jpg", $resp->getUser()->getProfilePicture());
    }

    /**
     * Test Exception
     *
     * @return void
     * @expectedException \GuzzleHttp\Exception\RequestException
     */
    public function testException()
    {
        $this->client->shouldReceive('send')->andReturnUsing(function(RequestInterface $request){
            $response = new \GuzzleHttp\Message\Response(404);
            throw new RequestException($request, $request, $response);
        });

        $auth = new InstagramAuth($this->config, $this->client);
        $resp = $auth->retrieveOAuthToken(md5("random"));
    }
}
