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

namespace Instagram\Response\Users;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Partials\UserInfo;
use JMS\Serializer\Annotation\Type;

class UserSearchResponse extends AbstractMediaResponse
{
    /**
     * @var UserInfo[]
     * @Type("ArrayCollection<Instagram\Response\Partials\UserInfo>")
     */
    protected $data;

    /**
     * Desc
     *
     * @return UserInfo[] | ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }
}
