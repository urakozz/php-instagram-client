<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.05.15
 * Time: 19:23
 */

namespace Instagram\Tests\Response;


use Instagram\Response\Partials\Pagination;

class PaginationTest extends \PHPUnit_Framework_TestCase {

    public function testSettersGetters(){

        $response = new Pagination();

        $response->setNextUrl("http://habrahabr.ru/post/87922/");
        $response->setNextMaxId("1256");

        $this->assertEquals("http://habrahabr.ru/post/87922/", $response->getNextUrl());
        $this->assertEquals("1256", $response->getNextMaxId());


    }

}
