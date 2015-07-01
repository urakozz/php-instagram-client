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


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractMediaResponse;
use JMS\Serializer\Annotation\Type;

class LocationSearchResponse extends AbstractMediaResponse
{
    /**
     * @var ArrayCollection | \Instagram\Response\Partials\Location[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Location>")
     */
    protected $data;

    /**
     * Desc
     *
     * @return ArrayCollection | \Instagram\Response\Partials\Location
     */
    public function getData()
    {
        return $this->data;
    }

}
