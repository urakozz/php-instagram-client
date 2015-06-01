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

namespace Instagram\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Instagram\Client\Config\AuthConfig;
use Instagram\Request\OAuth\OAuthRequest;
use Instagram\Response\OAuth\OAuthResponse;
use Instagram\Serializer\InstagramSerializerInterface;
use Instagram\Serializer\JMSSerializer;


/**
 * PHP Version 5
 *
 * Class InstagramAuth
 *
 * @package   Instagram\Client
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class InstagramAuth extends InstagramClientUnauthorized
{

    /**
     * Desc
     *
     * @return string
     */
    public function getOAuthUrl()
    {
        return sprintf("https://api.instagram.com/oauth/authorize/?%s", http_build_query($this->getOAuthAttributes()));
    }

    /**
     * Get Authorization Object
     *
     * @param $code
     * @return OAuthResponse
     * @throws RequestException
     */
    public function retrieveOAuthToken($code)
    {
        $attributes = $this->getTokenAttributes($code);
        return parent::call(new OAuthRequest($attributes));
    }

    /**
     * Get auth request attributes
     *
     * @return array
     */
    protected function getOAuthAttributes()
    {
        $attributes                  = [];
        $attributes['client_id']     = $this->config->getKey();
        $attributes['response_type'] = 'code';
        $attributes['redirect_uri']  = $this->config->getRedirectUrl();
        $attributes['scopes']        = implode("+", $this->config->getScopes());
        return $attributes;
    }

    /**
     * Get token request attributes
     *
     * @param $code
     * @return array
     */
    protected function getTokenAttributes($code)
    {
        $attributes                 = [];
        $attributes['grant_type']   = 'authorization_code';
        $attributes['redirect_uri'] = $this->config->getRedirectUrl();
        $attributes['code']         = $code;
        return $attributes;
    }
}