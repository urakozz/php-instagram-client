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
use Instagram\Response\AbstractInstagramResponse;

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
     * Endpoint
     *
     * @var string
     */
    protected $endPoint = "https://api.instagram.com/v1";

    /** @var string */
    protected $token;

    /** @var string */
    protected $clientId;

    /** @var string */
    protected $clientSecret;

    /** @var array */
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

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
     * @return AbstractInstagramResponse
     */
    abstract public function getResponsePrototype();

    /**
     * Desc
     *
     * @param ClientInterface $client
     * @return \GuzzleHttp\Message\RequestInterface
     */
    public function getRequest(ClientInterface $client)
    {
        $options       = [];
        $key           = "POST" === $this->getMethod() ? "body" : "query";
        $options[$key] = $this->collectAttributes();

        return $client->createRequest($this->getMethod(), $this->getAbsoluteUrl(), $options);
    }

    /**
     * Desc
     *
     * @return string
     */
    protected function getAbsoluteUrl()
    {
        return $this->endPoint . $this->getUrl();
    }

    protected function collectAttributes()
    {
        $attributes = (array) $this->getAttributes();
        if ($this->token) {
            $attributes['access_token'] = $this->token;
        }
        if ($this->clientId) {
            $attributes['client_id'] = $this->clientId;
        }
        if ($this->clientId) {
            $attributes['client_secret'] = $this->clientSecret;
        }
        return $attributes;
    }
}