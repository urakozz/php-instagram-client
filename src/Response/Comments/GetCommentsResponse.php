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

namespace Instagram\Response\Comments;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractMediaResponse;
use JMS\Serializer\Annotation\Type;

class GetCommentsResponse extends AbstractMediaResponse
{

    /**
     * @var \Instagram\Response\Partials\Caption[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Caption>")
     */
    protected $data;

    /**
     * Desc
     *
     * @return ArrayCollection | \Instagram\Response\Partials\Caption[]
     */
    public function getData()
    {
        return $this->data;
    }
}
