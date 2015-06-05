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
    use InstagramCallTrait;

    /**
     * @var TokenConfig
     */
    protected $config;

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
        $this->serializer = new JMSSerializer();
        $this->setClient($client ?: new Client());
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
        $response = $this->doCall($request);
        $json     = $response->getBody()->getContents();
//        echo json_encode(json_decode($json),JSON_PRETTY_PRINT);
//        file_put_contents("tests/Client/fixtures/likes.get.json", json_encode(json_decode($json),JSON_PRETTY_PRINT));
        $res = $this->serializer->deserialize($json, $request->getResponsePrototype());
        return $res;
    }
}
