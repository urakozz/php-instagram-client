<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 07.06.15
 * Time: 23:17
 */

namespace Instagram\Request\Relationships;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Request\Traits\MethodGet;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Relationships\UserListResponse;


class GetUserFollowsRequest extends AbstractInstagramRequest
{
    use MethodGet;

    public function setUserId($userId)
    {
        $this['user_id'] = $userId;
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/user/{user_id}/follows";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return ['user_id'];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new UserListResponse;
    }
}
