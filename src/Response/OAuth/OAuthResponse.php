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

namespace Instagram\Response\OAuth;

use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Partials\UserInfo;
use JMS\Serializer\Annotation\Type;

/**
 * PHP Version 5
 *
 * Class OAuthResponse
 *
 * @package   Instagram\Response\OAuth
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class OAuthResponse extends AbstractInstagramResponse
{
    /**
     * @var int
     * @Type("integer")
     */
    protected $code;

    /**
     * @var string
     * @Type("string")
     */
    protected $errorType;

    /**
     * @var string
     * @Type("string")
     */
    protected $errorMessage;

    /**
     * @var UserInfo
     * @Type("Instagram\Response\Partials\UserInfo")
     */
    protected $user;

    /**
     * @var string
     * @Type("string")
     */
    protected $accessToken;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getErrorType()
    {
        return $this->errorType;
    }

    /**
     * @param string $errorType
     */
    public function setErrorType($errorType)
    {
        $this->errorType = $errorType;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return UserInfo
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInfo $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }




}