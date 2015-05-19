<?php
/**
 * Created by PhpStorm.
 * User: Ri
 * Date: 19.05.2015
 * Time: 23:44
 */

namespace Instagram\Tests\Response;

use Instagram\Response\Partials\Caption;
use Instagram\Response\Partials\UserInfo;

class CaptionTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters()
    {
        $response = new Caption();
        $data = new UserInfo();

        $response->setId("22");
        $response->setText("Hello InstaTranslate!");
        $response->setCreatedTime("11.11.11");
        $response->setFrom($data);
        $response->setTranslation("Здравствуй InstaTranslate!");

        $this->assertEquals("22", $response->getId());
        $this->assertEquals("Hello InstaTranslate!", $response->getText());
        $this->assertEquals("11.11.11", $response->getCreatedTime());
        $this->assertEquals($data, $response->getFrom());
        $this->assertEquals("test word", $response->getTranslation());

        $this->assertNull($response->isTranslated());

    }

}
