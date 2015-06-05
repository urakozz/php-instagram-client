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
use Instagram\Response\AbstractInstagramResponse;
use JMS\Serializer\Annotation\Type;

class RealTimeSubscription extends AbstractInstagramResponse
{

    /**
     * @var string
     * @Type("string")
     */
    protected $changedAspect;

    /**
     * @var string
     * @Type("string")
     */
    protected $object;

    /**
     * @var string
     * @Type("string")
     */
    protected $objectId;

    /**
     * @var integer
     * @Type("integer")
     */
    protected $time;

    /**
     * @var integer
     * @Type("integer")
     */
    protected $subscriptionId;

    /**
     * @var ArrayCollection
     * @Type("ArrayCollection<string, string>")
     */
    protected $data;

    /**
     * @return int
     */
    public function getCode()
    {
        return 0;
    }

    /**
     * Desc
     *
     * @return string
     */
    public function getErrorType()
    {
        return null;
    }

    /**
     * Desc
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getChangedAspect()
    {
        return $this->changedAspect;
    }

    /**
     * @param string $changedAspect
     */
    public function setChangedAspect($changedAspect)
    {
        $this->changedAspect = $changedAspect;
    }

    /**
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param string $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return string
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * @param string $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param int $subscriptionId
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @return ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ArrayCollection $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}
