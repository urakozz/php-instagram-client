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

namespace Instagram\Request\Traits;


trait LatLng
{
    public function setLat($lat)
    {
        $this['lat'] = $lat;
    }

    public function setLng($lng)
    {
        $this['lng'] = $lng;
    }
}