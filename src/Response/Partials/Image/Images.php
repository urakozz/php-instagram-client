<?php

namespace Instagram\Response\Partials\Image;


use JMS\Serializer\Annotation\Type;

/**
 * PHP Version 5
 *
 * Class Images
 *
 * @package   Instagram\Response\Partials\Image
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class Images
{

    /**
     * @var ImageDetails
     * @Type("Instagram\Response\Partials\Image\ImageDetails")
     */
    protected $thumbnail;

    /**
     * @var ImageDetails
     * @Type("Instagram\Response\Partials\Image\ImageDetails")
     */
    protected $lowResolution;

    /**
     * @var ImageDetails
     * @Type("Instagram\Response\Partials\Image\ImageDetails")
     */
    protected $standardResolution;

    /**
     * @return ImageDetails
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param ImageDetails $thumbnail
     */
    public function setThumbnail(ImageDetails $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return ImageDetails
     */
    public function getLowResolution()
    {
        return $this->lowResolution;
    }

    /**
     * @param ImageDetails $lowResolution
     */
    public function setLowResolution(ImageDetails $lowResolution)
    {
        $this->lowResolution = $lowResolution;
    }

    /**
     * @return ImageDetails
     */
    public function getStandardResolution()
    {
        return $this->standardResolution;
    }

    /**
     * @param ImageDetails $standardResolution
     */
    public function setStandardResolution(ImageDetails $standardResolution)
    {
        $this->standardResolution = $standardResolution;
    }


}
