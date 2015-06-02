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

namespace Instagram\Tests\Response\Users;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Users\SelfFeedResponse;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;

class SelfFeedResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testInheritance()
    {
        $response = new SelfFeedResponse();
        $this->assertInstanceOf(AbstractInstagramResponse::class, $response);
        $this->assertInstanceOf(AbstractMediaResponse::class, $response);
    }

    public function testSettersGetters()
    {
        $response = new SelfFeedResponse();

        $meta = new Meta();
        $meta->setCode(200);
        $response->setMeta($meta);

        $data = new ArrayCollection([]);
        $response->setData($data);

        $pagination = new Pagination();
        $pagination->setNextUrl("http://i.urakozz.me/next/1");
        $pagination->setNextMaxId("1");
        $response->setPagination($pagination);

        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertEquals($meta, $response->getMeta());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());
        $this->assertEquals($data, $response->getData());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertEquals($pagination, $response->getPagination());
    }

    public function testIsOk()
    {
        $response = new SelfFeedResponse();
        $meta = new Meta();
        $meta->setCode(200);
        $response->setMeta($meta);

        $this->assertTrue($response->isOk());
    }
}