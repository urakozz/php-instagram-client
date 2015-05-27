<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 20:07
 */

namespace Instagram\Tests\Response\Partials\Sequence;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\Partials\Sequence\Comments;

class CommentsTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new Comments();
        $response->setCount(123);
        $response->setData(new ArrayCollection(["one" => "first", 'two'=>'second', 'three'=>3]));

        $this->assertEquals(123, $response->getCount());
        $this->assertEquals(array("one" => "first", 'two'=>'second', 'three'=>3), $response->getData()->toArray());

    }

}
