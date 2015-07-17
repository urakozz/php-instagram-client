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
use Instagram\Request\Traits\Distance;
use Instagram\Request\Traits\LatLng;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Locations\LocationSearchResponse;

class LocationSearchRequest extends AbstractInstagramRequest
{

    use Distance;
    use LatLng;

    public function setFacebookPlaceId($id)
    {
        $this['facebook_places_id'] = $id;
    }

    public function setFoursquareId($id)
    {
        $this['foursquare_id'] = $id;
    }

    public function setFoursquareV2Id($id)
    {
        $this['foursquare_v2_id'] = $id;
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
        return "/locations/search";
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
        return new LocationSearchResponse();
    }
}
