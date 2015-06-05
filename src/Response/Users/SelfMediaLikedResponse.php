<?php

namespace Instagram\Response\Users;

use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Partials\Media;
use JMS\Serializer\Annotation\Type;

/**
 * PHP Version 5
 *
 * Class SelfMediaLikedResponse
 *
 * @package   Instagram\Response\Media\Users
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class SelfMediaLikedResponse extends AbstractMediaResponse
{
    /**
     * @var Media[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Media>")
     */
    protected $data;

    /**
     * Desc
     *
     * @return \Instagram\Response\Partials\Media[] | ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }

}