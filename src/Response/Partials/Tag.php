<?php
/**
 * PHP Version 5
 *
 * @category  H24
 * @package   H24
 * @author    "Yury Kozyrev" <yury.kozyrev@home24.de>
 * @copyright 2015 Home24 GmbH
 * @license   Proprietary license.
 * @link      http://www.home24.de
 */

namespace Instagram\Response\Partials;


use JMS\Serializer\Annotation\Type;

class Tag
{

    /**
     * @var integer
     * @Type("integer")
     */
    protected $mediaCount;

    /**
     * @var string
     * @Type("string")
     */
    protected $name;

    /**
     * @return int
     */
    public function getMediaCount()
    {
        return $this->mediaCount;
    }

    /**
     * @param int $mediaCount
     */
    public function setMediaCount($mediaCount)
    {
        $this->mediaCount = $mediaCount;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}
