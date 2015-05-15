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

use Instagram\Client\Config\TokenConfig;

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
class InstagramClient
{
    /**
     * @var TokenConfig
     */
    protected $config;

    /**
     * @param TokenConfig $config
     */
    public function __construct(TokenConfig $config)
    {
        $this->config = $config;
    }
}