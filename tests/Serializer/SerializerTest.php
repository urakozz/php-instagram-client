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

namespace Instagram\Tests\Serializer;


use Instagram\Serializer\InstagramSerializerInterface;
use Instagram\Serializer\JMSSerializer;
use JMS\Serializer\SerializerBuilder;

class SerializerTest extends \PHPUnit_Framework_TestCase
{

    public function testSerializer()
    {
        $serializer = new JMSSerializer();
        $this->assertInstanceOf(InstagramSerializerInterface::class, $serializer);
        $builder = $serializer->getSerializerBuilder();
        $this->assertInstanceOf(SerializerBuilder::class, $builder);
    }
}