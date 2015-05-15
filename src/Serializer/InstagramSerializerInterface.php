<?php


namespace Instagram\Serializer;


use Instagram\Response\AbstractInstagramResponse;

/**
 * Interface InstagramSerializerInterface
 *
 * @package Instagram\Serializer
 *
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
interface InstagramSerializerInterface
{

    /**
     * Deserialize JSON to Response object
     *
     * @param string $json
     * @param AbstractInstagramResponse $response
     * @return AbstractInstagramResponse
     */
    public function deserialize($json, AbstractInstagramResponse $response);
}