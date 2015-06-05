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

namespace Instagram\Response\Comments;


use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Traits\EmptyResponseTrait;

class PostCommentResponse extends AbstractMediaResponse
{

    /**
     * Desc
     *
     * @return boolean
     */
    public function getData()
    {
        return $this->data;
    }
}
