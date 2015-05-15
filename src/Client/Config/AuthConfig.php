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
 * Class AuthConfig
 *
 * @package   Instagram\Client\Config
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class AuthConfig extends AbstractConfig
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $redirectUrl;

    /**
     * @var array
     */
    protected $scopes = [];

    /**
     * @param $key
     * @param $secret
     * @param $redirectUrl
     * @param array $scopes
     */
    public function __construct($key, $secret, $redirectUrl, array $scopes = [])
    {
        $this->key         = $key;
        $this->secret      = $secret;
        $this->redirectUrl = $redirectUrl;
        $this->scopes      = $scopes ?: ['basic'];
        $this->validate();
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @return array
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @return void
     */
    protected function doValidate()
    {
        // TODO: Implement doValidate() method.
    }
}