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
use Instagram\Request\Traits\Distance;
use Instagram\Request\Traits\LatLng;
use Instagram\Request\Traits\Timestamp;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Media\ListMediaResponse;

class MediaSearchRequest extends AbstractInstagramRequest
{

    use Timestamp;
    use LatLng;
    use Distance;

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
