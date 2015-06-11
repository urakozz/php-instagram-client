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

namespace Instagram\Request\Likes;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Request\Traits\MethodDelete;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Likes\DeleteLikeResponse;

class DeleteLikeRequest extends AbstractInstagramRequest
{
    use MethodDelete;

    public function setMediaId($mediaId)
    {
        $this['media_id'] = $mediaId;
    }

    /**
     * Get Request URL
     *
     * @return string
     */
    public function getUrl()
    {
        return "/media/{media_id}/likes";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return ["media_id"];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new DeleteLikeResponse();
    }
}
