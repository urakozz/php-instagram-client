<?php


namespace Instagram\Serializer;


use Instagram\Response\InstagramResponse;

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
     * @param InstagramResponse $response
     * @return InstagramResponse
     */
    public function deserialize($json, InstagramResponse $response);
}