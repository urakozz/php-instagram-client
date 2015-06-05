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

namespace Instagram\Request\Media;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Media\ListMediaResponse;

class MediaSearchRequest extends AbstractInstagramRequest
{

    public function setDistance($distance)
    {
        $this['distance'] = $distance;
    }

    public function setLat($lat)
    {
        $this['lat'] = $lat;
    }

    public function setLng($lng)
    {
        $this['lng'] = $lng;
    }

    public function setMaxTimestamp($max)
    {
        $this['max_timestamp'] = $max;
    }

    public function setMinTimestamp($min)
    {
        $this['min_timestamp'] = $min;
    }

    /**
     * Get Request Method (GET|POST|DELETE)
     *
     * @return string
     */
    public function getMethod()
    {
        return "GET";
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/media/search";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return [];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new ListMediaResponse();
    }
}
