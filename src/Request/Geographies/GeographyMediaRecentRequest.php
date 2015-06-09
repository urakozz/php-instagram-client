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

namespace Instagram\Request\Geographies;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Request\Traits\Count;
use Instagram\Request\Traits\MethodGet;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Geographies\GeographyMediaRecentResponse;

class GeographyMediaRecentRequest extends AbstractInstagramRequest
{

    use MethodGet;

    use Count;

    public function setGeoId($id)
    {
        $this['geo_id'] = $id;
    }

    public function setMinId($id)
    {
        $this['min_id'] = $id;
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/geographies/{geo_id}/media/recent";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return ['geo_id'];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new GeographyMediaRecentResponse();
    }
}