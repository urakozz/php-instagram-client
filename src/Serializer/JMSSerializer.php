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

namespace Instagram\Serializer;


use Instagram\Response\AbstractInstagramResponse;
use JMS\Serializer\SerializerBuilder;

class JMSSerializer implements InstagramSerializerInterface
{
    /**
     * @var SerializerBuilder
     */
    protected $serializerBuilder;

    public function __construct()
    {
        $this->serializerBuilder = \JMS\Serializer\SerializerBuilder::create();
        \Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
    }

    /**
     * Desc
     *
     * @return SerializerBuilder|static
     */
    public function getSerializerBuilder()
    {
        return $this->serializerBuilder;
    }

    /**
     * Desc
     *
     * @return \JMS\Serializer\Serializer
     */
    public function getSerializer()
    {
        return $this->serializerBuilder->build();
    }

    /**
     * Deserialize JSON to Response object
     *
     * @param string $json
     * @param AbstractInstagramResponse $response
     * @return AbstractInstagramResponse
     */
    public function deserialize($json, AbstractInstagramResponse $response)
    {
        return $this->getSerializer()->deserialize($json, get_class($response), 'json');
    }
}