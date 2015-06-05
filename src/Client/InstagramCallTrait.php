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


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use Instagram\Request\AbstractInstagramRequest;

trait InstagramCallTrait
{

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param ClientInterface $client
     */
    protected function setClient($client)
    {
        $this->client = $client;
    }


    /**
     * Desc
     *
     * @param AbstractInstagramRequest $request
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function doCall(AbstractInstagramRequest $request)
    {
        $guzzleRequest = $request->getRequestPromise($this->client);
        try {
            return $guzzleRequest->wait();
        } catch (BadResponseException $e) {
            if ($e->getCode() === 400) {
                return $e->getResponse();
            }
            throw $e;
        }
    }
}
