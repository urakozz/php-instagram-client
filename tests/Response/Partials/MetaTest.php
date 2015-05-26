<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 19:13
 */

namespace Instagram\Tests\Response;


use Instagram\Response\Partials\Meta;

class MetaTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new Meta();


        $response->setCode(12323);
        $response->setErrorType("Erorr 123");
        $response->setErrorMessage("Hello world!");

        $this->assertEquals(12323, $response->getCode());
        $this->assertEquals("Erorr 123", $response->getErrorType());
        $this->assertEquals("Hello world!", $response->getErrorMessage());
    }

}
