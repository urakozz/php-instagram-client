<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 0:52
 */

namespace Instagram\Tests\Response;

use Instagram\Response\Partials\Caption;
use Instagram\Response\Partials\Image\Images;
use Instagram\Response\Partials\Media;
use Instagram\Response\Partials\Sequence\Likes;
use Instagram\Response\Partials\UserInfo;
use Instagram\Response\Partials\Sequence\Comments;



class MediaTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new Media();
        $comments = new Comments();
        $likes = new Likes();
        $images = new Images();
        $caption = new Caption();
        $user = new UserInfo();


        $response->setAttribution("String");
        $response->setTags(array('one','two','three'));
        $response->setLocation(array('four','five','six'));
        $response->setComments($comments);
        $response->setLikes($likes);
        $response->setFilter('string2');
        $response->setCreatedTime('11.11.11 12:12:12');
        $response->setLink('string3');
        $response->setImages($images);
        $response->setUserInPhoto(array('img1.jpg','img2.jpg','img3.jpg'));
        $response->setCaption($caption);
        $response->setUserHasLiked(true);
        $response->setUser($user);


        $this->assertEquals("String", $response->getAttribution());
        $this->assertEquals(array('one','two','three'), $response->getTags());
        $this->assertEquals(array('four','five','six'), $response->getLocation());
        $this->assertEquals($comments, $response->getComments());
        $this->assertEquals($likes, $response->getLikes());
        $this->assertEquals('string2', $response->getFilter());
        $this->assertEquals('11.11.11 12:12:12', $response->getCreatedTime());
        $this->assertEquals('string3', $response->getLink());
        $this->assertEquals($images, $response->getImages());
        $this->assertEquals(array('img1.jpg','img2.jpg','img3.jpg'), $response->getUserInPhoto());
        $this->assertEquals($caption, $response->getCaption());
        $this->assertEquals($user, $response->getUser());

        $this->assertTrue($response->isUserHasLiked());

    }

}
