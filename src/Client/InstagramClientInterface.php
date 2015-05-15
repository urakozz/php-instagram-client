<?php

namespace Instagram\Client;
use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractInstagramResponse;

/**
 * Interface InstagramClientInterface
 *
 * @package Instagram\Client
 *
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
interface InstagramClientInterface
{
    /**
     * Make request
     *
     * @param AbstractInstagramRequest $request
     * @return AbstractInstagramResponse
     */
    public function call(AbstractInstagramRequest $request);
}