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


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class Caption
{

    /**
     * @var string
     * @Type("string")
     * @SerializedName("id")
     */
    public $captionId;

    /**
     * @var string
     * @Type("string")
     */
    public $text;

    /**
     * @var string
     */
    public $translation;

    /**
     * @var string
     * @Type("string")
     */
    public $created_time;

    /**
     * @var UserInfo
     * @Type("Instagram\Response\Partials\UserInfo")
     */
    public $from;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->captionId;
    }

    /**
     * @param string $captionId
     */
    public function setId($captionId)
    {
        $this->captionId = $captionId;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->created_time;
    }

    /**
     * @param string $created_time
     */
    public function setCreatedTime($created_time)
    {
        $this->created_time = $created_time;
    }

    /**
     * @return UserInfo
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param UserInfo $from
     */
    public function setFrom(UserInfo $from)
    {
        $this->from = $from;
    }

    /**
     * Desc
     *
     * @param $string
     * @return void
     */
    public function setTranslation($string)
    {
        $this->translation = $string;
    }

    /**
     * Desc
     *
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    public function isTranslated()
    {
        return $this->translation && $this->translation !== $this->text;
    }
}
