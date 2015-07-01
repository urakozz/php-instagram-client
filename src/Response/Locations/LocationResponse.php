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

namespace Instagram\Response\Locations;


use Instagram\Response\AbstractMediaResponse;
use JMS\Serializer\Annotation\Type;

class LocationResponse extends AbstractMediaResponse
{
    /**
     * @var \Instagram\Response\Partials\Location
     * @Type("Instagram\Response\Partials\Location")
     */
    protected $data;

    /**
     * Desc
     *
     * @return \Instagram\Response\Partials\Location
     */
    public function getData()
    {
        return $this->data;
    }

}
