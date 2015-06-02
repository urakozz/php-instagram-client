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

namespace Instagram\Response\Partials\User;

use JMS\Serializer\Annotation\Type;

class UserCounts {

    /**
     * @var integer
     * @Type("integer")
     */
    protected $media;

    /**
     * @var integer
     * @Type("integer")
     */
    protected $followedBy;

    /**
     * @var integer
     * @Type("integer")
     */
    protected $follows;

    /**
     * @return int
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param int $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return int
     */
    public function getFollowedBy()
    {
        return $this->followedBy;
    }

    /**
     * @param int $followedBy
     */
    public function setFollowedBy($followedBy)
    {
        $this->followedBy = $followedBy;
    }

    /**
     * @return int
     */
    public function getFollows()
    {
        return $this->follows;
    }

    /**
     * @param int $follows
     */
    public function setFollows($follows)
    {
        $this->follows = $follows;
    }

}