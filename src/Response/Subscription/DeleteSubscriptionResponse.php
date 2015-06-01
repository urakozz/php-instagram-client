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

namespace Instagram\Response\Subscription;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractMediaResponse;
use JMS\Serializer\Annotation\Type;

class DeleteSubscriptionResponse extends AbstractMediaResponse
{

    /**
     * @var ArrayCollection
     * @Type("Doctrine\Common\Collections\ArrayCollection")
     */
    protected $data;

    /**
     * @return ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }
}