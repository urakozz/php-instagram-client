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
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
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
     * Get Request Attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
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