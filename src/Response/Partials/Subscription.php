<?php

namespace Instagram\Response\Partials;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class Subscription
{
    /**
     * @var string
     * @Type("string")
     * @SerializedName("id")
     */
    protected $subscriptionId;

    /**
     * @var string
     * @Type("string")
     */
    protected $type;

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
     * @var string
     * @Type("string")
     */
    protected $aspect;

    /**
     * @var string
     * @Type("string")
     */
    protected $callback_url;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $subscriptionId
     */
    public function setId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return string
     */
    public function getAspect()
    {
        return $this->aspect;
    }

    /**
     * @param string $aspect
     */
    public function setAspect($aspect)
    {
        $this->aspect = $aspect;
    }

    /**
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->callback_url;
    }

    /**
     * @param string $callback_url
     */
    public function setCallbackUrl($callback_url)
    {
        $this->callback_url = $callback_url;
    }


}