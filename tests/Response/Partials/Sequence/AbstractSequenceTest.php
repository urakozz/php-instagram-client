<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 19:55
 */


namespace Instagram\Tests\Response\Partials\Sequence;

use Instagram\Response\Partials\Sequence;

class AbstractSequenceTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new Sequence\AbstractSequence();

        $response->setCount(123);
        $response->setData(array("one" => "first", 'two'=>'second', 'three'=>3));

        $this->assertEquals(123, $response->getCount());
        $this->assertEquals(array("one" => "first", 'two'=>'second', 'three'=>3), $response->getData());

    }



    }
