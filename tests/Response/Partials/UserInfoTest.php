<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 19:29
 */

namespace Instagram\Tests\Response;


use Instagram\Response\Partials\UserInfo;

class UserInfoTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new UserInfo();


        $response->setId("ID123");
        $response->setUsername("username");
        $response->setFullName("FullName");
        $response->setProfilePicture("/path/to/picture/foto12.jpg");
        $response->setBio("bio");
        $response->setWebsite("https://github.com/urakozz/php-instagram-client");

        $this->assertEquals("ID123", $response->getId());
        $this->assertEquals("username", $response->getUsername());
        $this->assertEquals("FullName", $response->getFullName());
        $this->assertEquals("/path/to/picture/foto12.jpg", $response->getProfilePicture());
        $this->assertEquals("bio", $response->getBio());
        $this->assertEquals("https://github.com/urakozz/php-instagram-client", $response->getWebsite());

    }

}
