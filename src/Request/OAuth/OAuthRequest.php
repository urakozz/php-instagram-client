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
use Instagram\Request\Traits\MethodPost;
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
    use MethodPost;

    /**
     * Endpoint
     *
     * @var string
     */
    protected $endPoint = "https://api.instagram.com/oauth";

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
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return [];
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
