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
use Instagram\Client\Config\TokenConfig;
use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Serializer\InstagramSerializerInterface;
use Instagram\Serializer\JMSSerializer;

/**
 * PHP Version 5
 *
 * Class InstagramClient
 *
 * @package   Instagram\Client
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class InstagramClient implements InstagramClientInterface
{
    /**
     * @var TokenConfig
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
     * @param TokenConfig $config
     * @param ClientInterface $client
     */
    public function __construct(TokenConfig $config, ClientInterface $client = null)
    {
        $this->config     = $config;
        $this->client     = $client ?: new Client();
        $this->serializer = new JMSSerializer();
    }

    /**
     * Make request
     *
     * @param AbstractInstagramRequest $request
     * @return AbstractInstagramResponse
     */
    public function call(AbstractInstagramRequest $request)
    {
        $request->setToken($this->config->getToken());
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
        $json = $response->getBody()->getContents();
//        file_put_contents("tests/fixtures/usersSelfFeed.json", json_encode(json_decode($json),JSON_PRETTY_PRINT));
        $res = $this->serializer->deserialize($json, $request->getResponsePrototype());
        return $res;
    }
}