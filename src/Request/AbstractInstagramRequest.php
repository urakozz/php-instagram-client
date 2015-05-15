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

namespace Instagram\Request;
use GuzzleHttp\ClientInterface;
use Instagram\Response\InstagramResponse;

/**
 * PHP Version 5
 *
 * Class AbstractInstagramRequest
 *
 * @category  H24
 * @package Instagram\Request
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
abstract class AbstractInstagramRequest
{

    /**
     * Get Request Method (GET|POST|DELETE)
     *
     * @return string
     */
    abstract public function getMethod();

    /**
     * Get Request URL
     *
     * @return string
     */
    abstract public function getUrl();

    /**
     * Get Request Attributes
     *
     * @return array
     */
    abstract public function getAttributes();

    /**
     * Get Response Prototype
     *
     * @return InstagramResponse
     */
    abstract public function getResponsePrototype();

    public function getRequest(ClientInterface $client)
    {
        $options = [];
        if($attributes = $this->getAttributes()){
            $key = "POST" === $this->getMethod() ? "body" : "query";
            $options[$key] = $attributes;
        }

        return $client->createRequest($this->getMethod(), $this->getUrl(), $options);
    }
}