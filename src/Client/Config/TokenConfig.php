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

namespace Instagram\Client\Config;

/**
 * PHP Version 5
 *
 * Class TokenConfig
 *
 * @package   Instagram\Client\Config
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class TokenConfig extends AbstractConfig
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->validate();
    }

    protected function doValidate()
    {
        // TODO: Implement doValidate() method.
    }
}