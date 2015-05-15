<?php

namespace Instagram\Response\Partials\Image;

use JMS\Serializer\Annotation\Type;

/**
 * PHP Version 5
 *
 * Class ImageDetails
 *
 * @package   Instagram\Response\Partials\Image
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class ImageDetails
{

    /**
     * @var string
     * @Type("string")
     */
    protected $url;

    /**
     * @var string
     * @Type("string")
     */
    protected $width;

    /**
     * @var string
     * @Type("string")
     */
    protected $height;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }


}