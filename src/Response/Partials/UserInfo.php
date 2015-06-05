<?php
/**
 * PHP Version 5
 *
 * @category  H24
 * @package   
 * @author    "Yury Kozyrev" <yury.kozyrev@home24.de>
 * @copyright 2015 Home24 GmbH
 * @license   Proprietary license.
 * @link      http://www.home24.de
 */

namespace Instagram\Response\Partials;


use Instagram\Response\Partials\User\UserCounts;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class UserInfo {

    /**
     * @var string
     * @Type("string")
     * @SerializedName("id")
     */
    protected $userId;

    /**
     * @var string
     * @Type("string")
     */
    protected $username;

    /**
     * @var string
     * @Type("string")
     */
    protected $fullName;

    /**
     * @var string
     * @Type("string")
     */
    protected $profilePicture;

    /**
     * @var string
     * @Type("string")
     */
    protected $bio;

    /**
     * @var string
     * @Type("string")
     */
    protected $website;

    /**
     * @var UserCounts
     * @Type("Instagram\Response\Partials\User\UserCounts")
     */
    protected $counts;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * @param mixed $profilePicture
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public function getCounts()
    {
        return $this->counts;
    }

}
