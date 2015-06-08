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

namespace Instagram\Response\Tag;

use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Partials\Tag;
use JMS\Serializer\Annotation\Type;

class TagSearchResponse extends AbstractMediaResponse
{

    /**
     * @var Tag[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Tag>")
     */
    protected $data;

    /**
     * @return ArrayCollection | \Instagram\Response\Partials\Tag[]
     */
    public function getData()
    {
        return $this->data;
    }
}