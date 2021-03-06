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

namespace Instagram\Response\Likes;


use Instagram\Response\AbstractMediaResponse;

class DeleteLikeResponse extends AbstractMediaResponse
{

    /**
     * Desc
     *
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }
}
