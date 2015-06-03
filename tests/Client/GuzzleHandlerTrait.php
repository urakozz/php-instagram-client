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

namespace Instagram\Tests\Client;


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

trait GuzzleHandlerTrait
{
    /**
     * @var HandlerStack
     */
    protected $handler;

    protected function getClient()
    {
        return new Client(['handler' => $this->handler]);
    }

    protected function createHandlerForResponse($code, $body)
    {
        $mock = new MockHandler([
            new \GuzzleHttp\Psr7\Response($code, [], $body)
        ]);

        $this->handler = HandlerStack::create($mock);
    }
}