<?php

namespace Instagram\Response;

/**
 * PHP Version 5
 *
 * Class AbstractInstagramResponse
 *
 * @package   Instagram\Response
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
abstract class AbstractInstagramResponse
{

    /**
     * @return int
     */
    abstract public function getCode();

    /**
     * Desc
     *
     * @return string
     */
    abstract public function getErrorType();

    /**
     * Desc
     *
     * @return string
     */
    abstract public function getErrorMessage();

    /**
     * Desc
     *
     * @return bool
     */
    public function isOk()
    {
        return !$this->getCode() || 200 === $this->getCode();
    }

}
