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

namespace Instagram\Request\OAuth;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\InstagramResponse;
use Instagram\Response\OAuth\OAuthResponse;

/**
 * PHP Version 5
 *
 * Class OAuthRequest
 *
 * @package   Instagram\Request\OAuth
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class OAuthRequest extends AbstractInstagramRequest
{
    /**
     * Endpoint
     *
     * @var string
     */
    protected $endPoint = "https://api.instagram.com/oauth";

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Get Request Method (GET|POST|DELETE)
     *
     * @return string
     */
    public function getMethod()
    {
        return "POST";
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/access_token";
    }

    /**
     * Get Request Attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get Response Prototype
     *
     * @return OAuthResponse
     */
    public function getResponsePrototype()
    {
        return new OAuthResponse();
    }
}