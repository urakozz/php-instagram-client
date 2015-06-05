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
use Instagram\Response\Subscription\DeleteSubscriptionResponse;

class DeleteSubscriptionRequest extends AbstractInstagramRequest
{

    /**
     * Set Id
     *
     * @param $id
     * @return void
     */
    public function setId($id)
    {
        $this['id'] = $id;
    }

    /**
     * Set object
     *
     * @param $object
     * @return void
     */
    public function setObject($object)
    {
        $this['object'] = $object;
    }

    /**
     * Get Request Method (GET|POST|DELETE)
     *
     * @return string
     */
    public function getMethod()
    {
        return "DELETE";
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
        return new DeleteSubscriptionResponse();
    }
}
