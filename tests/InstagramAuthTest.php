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


use Instagram\Client\Config\AuthConfig;
use Instagram\Client\InstagramAuth;
use Instagram\Response\OAuth\OAuthResponse;

class InstagramAuthTest extends \PHPUnit_Framework_TestCase
{
    protected $config;

    protected $errorJson = '{"code": 400, "error_type": "OAuthException", "error_message": "No matching code found."}"';
    protected $successJson = '{"access_token":"228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82","user":{"username":"urakozz","bio":"Senior Software Engineer, Home24 GmbH","website":"http:\/\/home24.de","profile_picture":"https:\/\/instagramimages-a.akamaihd.net\/profiles\/profile_228952246_75sq_1398293168.jpg","full_name":"Yury Kozyrev","id":"228952246"}}"';

    public function setUp()
    {
        $this->config = new AuthConfig("d2cbeff4792242f7b49ea65f984a1237", "f95c2c4cd80348258685d04b68ce0b64", "http://192.168.50.50/auth");
    }

    public function testGetLink()
    {
        $auth = new InstagramAuth($this->config);
        $url = $auth->getOAuthUrl();
        $this->assertEquals(
            'https://api.instagram.com/oauth/authorize/?client_id=d2cbeff4792242f7b49ea65f984a1237&response_type=code&redirect_uri=http%3A%2F%2F192.168.50.50%2Fauth&scopes=basic',
            $url);
    }

    public function testToken(){
        $auth = new InstagramAuth($this->config);
        $resp = $auth->retrieveOAuthToken("9e2ec90302d045398d8df2b7b9c4569-");
        $this->assertInstanceOf(OAuthResponse::class, $resp);
        $this->assertFalse($resp->isOk());
    }
}