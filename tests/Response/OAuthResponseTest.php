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

namespace Instagram\Tests\Response;


use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\OAuth\OAuthResponse;
use Instagram\Response\Partials\UserInfo;

class OAuthResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testInheritance()
    {
        $response = new OAuthResponse();
        $this->assertInstanceOf(AbstractInstagramResponse::class, $response);
    }

    public function testSettersGetters()
    {
        $response = new OAuthResponse();
        $response->setAccessToken("token");
        $response->setCode(100);
        $response->setErrorMessage("er_mes");
        $response->setErrorType("OAuth");
        $response->setUser(new UserInfo());

        $this->assertEquals("token", $response->getAccessToken());
        $this->assertEquals(100, $response->getCode());
        $this->assertEquals("er_mes", $response->getErrorMessage());
        $this->assertEquals("OAuth", $response->getErrorType());
        $this->assertInstanceOf(UserInfo::class, $response->getUser());
    }

    public function testIsOk()
    {
        $response = new OAuthResponse();
        $this->assertTrue($response->isOk());

        $response->setCode(0);
        $this->assertTrue($response->isOk());

        $response->setCode(400);
        $this->assertFalse($response->isOk());
    }

}