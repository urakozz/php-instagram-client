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

namespace Instagram\Request\Tag;


use Instagram\Request\AbstractInstagramRequest;
use Instagram\Response\AbstractInstagramResponse;
use Instagram\Response\Tag\TagResponse;

class TagRequest extends AbstractInstagramRequest
{

    public function setTagName($tag)
    {
        $this['tag_name'] = $tag;
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
        return "/tags/{tag_name}";
    }

    /**
     * Get required attributes
     *
     * @return mixed
     */
    public function getRequiredAttributes()
    {
        return ['tag_name'];
    }

    /**
     * Get Response Prototype
     *
     * @return AbstractInstagramResponse
     */
    public function getResponsePrototype()
    {
        return new TagResponse();
    }
}