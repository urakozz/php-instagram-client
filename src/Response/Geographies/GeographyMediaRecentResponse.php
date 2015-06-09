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

namespace Instagram\Response\Geographies;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractMediaResponse;
use JMS\Serializer\Annotation\Type;

class GeographyMediaRecentResponse extends AbstractMediaResponse
{
    /**
     * @var \Instagram\Response\Partials\Media[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Media>")
     */
    protected $data;

    /**
     * Desc
     *
     * @return ArrayCollection | \Instagram\Response\Partials\Media
     */
    public function getData()
    {
        return $this->data;
    }
}