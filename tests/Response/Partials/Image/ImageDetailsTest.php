<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 20:11
 */

namespace Instagram\Tests\Response\Partials\Image;

use Instagram\Response\Partials\Image\ImageDetails;

class ImageDetailsTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new ImageDetails();

        $response->setUrl("http://habrahabr.ru/post/87922/");
        $response->setWidth(100);
        $response->setHeight(200);

        $this->assertEquals("http://habrahabr.ru/post/87922/", $response->getUrl());
        $this->assertEquals(100, $response->getWidth());
        $this->assertEquals(200, $response->getHeight());

    }

}
