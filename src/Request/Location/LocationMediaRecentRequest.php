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

namespace Instagram\Request\Location;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Request\Traits\IdMinMax;
use Instagram\Request\Traits\Timestamp;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Locations\LocationMediaRecentResponse;

class LocationMediaRecentRequest extends AbstractInstagramRequest
{

    use Timestamp;
    use IdMinMax;

    /**
     * Desc
     *
     * @param $locationId
     * @return void
     */
    public function setLocationId($locationId)
    {
        $this['location_id'] = $locationId;
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
        return "/locations/{location_id}/media/recent";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return ['location_id'];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new LocationMediaRecentResponse();
    }
}
