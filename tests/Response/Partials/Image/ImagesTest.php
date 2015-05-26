<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 20:19
 */

namespace Instagram\Tests\Response\Partials\Image;


use Instagram\Response\Partials\Image\ImageDetails;
use Instagram\Response\Partials\Image\Images;

class ImagesTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new Images();
        $imageDetails = new ImageDetails();

        $response->setThumbnail($imageDetails);
        $response->setLowResolution($imageDetails);
        $response->setStandardResolution($imageDetails);

        $this->assertEquals($imageDetails, $response->getThumbnail());
        $this->assertEquals($imageDetails, $response->getLowResolution());
        $this->assertEquals($imageDetails, $response->getStandardResolution());

    }

}
