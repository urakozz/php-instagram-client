<?php

namespace Instagram\Client;
use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\InstagramResponse;

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
     * @return InstagramResponse
     */
    public function call(AbstractInstagramRequest $request);
}