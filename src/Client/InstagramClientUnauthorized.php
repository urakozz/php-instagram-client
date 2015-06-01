<?php
/**
 * PHP Version 5
 *
 * @category  H24
 * @package   H24
 * @author    "Yury Kozyrev" <yury.kozyrev@home24.de>
 * @copyright 2015 Home24 GmbH
 * @license   Proprietary license.
 * @link      http://www.home24.de
 */

namespace Instagram\Client;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Instagram\Client\Config\AuthConfig;
use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Serializer\InstagramSerializerInterface;
use Instagram\Serializer\JMSSerializer;

class InstagramClientUnauthorized  implements InstagramClientInterface{

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
     * Make request
     *
     * @param AbstractInstagramRequest $request
     * @return AbstractInstagramResponse
     */
    public function call(AbstractInstagramRequest $request)
    {
        $request->setClientId($this->config->getKey());
        $request->setClientSecret($this->config->getSecret());
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
        echo $json;
        $res  = $this->serializer->deserialize($json, $request->getResponsePrototype());
        return $res;
    }
}