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
use Instagram\Request\Traits\MethodDelete;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Comments\DeleteCommentResponse;

class DeleteCommentRequest extends AbstractInstagramRequest
{

    use MethodDelete;

    public function setMediaId($mediaId)
    {
        $this['media_id'] = $mediaId;
    }

    public function setCommentId($commentId)
    {
        $this['comment_id'] = $commentId;
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/media/{media_id}/comments/{comment_id}";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return ['media_id', 'comment_id'];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new DeleteCommentResponse();
    }
}
