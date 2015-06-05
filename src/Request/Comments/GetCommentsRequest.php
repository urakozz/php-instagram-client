<?php
/**
 * PHP Version 5
 *
 * @package
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */

namespace Instagram\Request\Comments;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Comments\GetCommentsResponse;
use Instagram\Response\Users\SelfMediaLikedResponse;

class GetCommentsRequest extends AbstractInstagramRequest
{

    public function setMediaId($mediaId)
    {
        $this['media_id'] = $mediaId;
    }

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
        return "/media/{media_id}/comments";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return ['media_id'];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new GetCommentsResponse();
    }
}
