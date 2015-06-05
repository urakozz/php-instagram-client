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


abstract class AbstractConfig
{

    protected function validate()
    {
        $this->doValidate();
    }

    abstract protected function doValidate();
}
