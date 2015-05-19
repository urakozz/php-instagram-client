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
class InstagramAuth
{

    /**
     * @var AuthConfig
     */
    protected $config;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var InstagramSerializerInterface
     */
    protected $serializer;

    /**
     * @param AuthConfig $config
     * @param ClientInterface $client
     */
    public function __construct(AuthConfig $config, ClientInterface $client = null)
    {
        $this->config     = $config;
        $this->client     = $client ?: new Client();
        $this->serializer = new JMSSerializer();
    }

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
        $attributes    = $this->getTokenAttributes($code);
        $request       = new OAuthRequest($attributes);
        $guzzleRequest = $request->getRequest($this->client);
        try {
            $response = $this->client->send($guzzleRequest);
        } catch (RequestException $e) {
            if ($e->getCode() === 400) {
                $response = $e->getResponse();
            } else {
                throw $e;
            }
        }
        $res = $this->serializer->deserialize($response->getBody()->getContents(), $request->getResponsePrototype());
        return $res;
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
        $attributes                  = [];
        $attributes['client_id']     = $this->config->getKey();
        $attributes['grant_type']    = 'authorization_code';
        $attributes['redirect_uri']  = $this->config->getRedirectUrl();
        $attributes['client_secret'] = $this->config->getSecret();
        $attributes['code']          = $code;
        return $attributes;
    }
}