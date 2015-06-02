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

namespace Instagram\Request\Subscription;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Subscription\CreateSubscriptionResponse;

class CreateSubscriptionRequest extends AbstractInstagramRequest
{

    public function setCallbackUrl($callbackUrl)
    {
        $this['callback_url'] = $callbackUrl;
    }

    public function setObject($object)
    {
        $this['object'] = $object;
    }

    public function setObjectId($objectId)
    {
        $this['object_id'] = $objectId;
    }

    public function setAspect($media)
    {
        $this['aspect'] = $media;
    }

    public function setLat($lat)
    {
        $this['lat'] = $lat;
    }

    public function setLng($lng)
    {
        $this['lng'] = $lng;
    }

    public function setRadius($radius)
    {
        $this['radius'] = $radius;
    }

    public function setVerifyToken($token)
    {
        $this['verify_token'] = $token;
    }

    /**
     * Get Request Method (GET|POST|DELETE)
     *
     * @return string
     */
    public function getMethod()
    {
        return "POST";
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/subscriptions";
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
        return new CreateSubscriptionResponse();
    }
}