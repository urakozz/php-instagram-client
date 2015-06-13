<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 07.06.15
 * Time: 23:17
 */

namespace Instagram\Request\Relationships;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\Users\UserResponse;
use Instagram\Response\AbstractInstagramResponse;


class GetUserRelationshipRequest extends AbstractInstagramRequest
{
    /**
     * Get Request Method (GET|POST|DELETE)
     *
     * @return string
     */
    public function getMethod()
    {
        return "GET";
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/user/{user_id}/relationship";
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

    }
}