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


use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class Location
{

    /**
     * @var string
     * @Type("string")
     * @SerializedName("id")
     */
    protected $locationId;

    /**
     * @var string
     * @Type("string")
     */
    protected $name;

    /**
     * @var float
     * @Type("float")
     */
    protected $latitude;

    /**
     * @var float
     * @Type("float")
     */
    protected $longitude;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->locationId;
    }

    /**
     * @param string $locationId
     */
    public function setId($locationId)
    {
        $this->locationId = $locationId;
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

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}
