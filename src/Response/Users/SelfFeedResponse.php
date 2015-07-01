<?php

namespace Instagram\Response\Users;

use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Partials\Media;
use JMS\Serializer\Annotation\Type;

/**
 * PHP Version 5
 *
 * Class SelfFeedResponse
 *
 * @package   Instagram\Response\Media\Users
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class SelfFeedResponse extends AbstractMediaResponse
{
    /**
     * @var Media[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Media>")
     */
    protected $data;

    /**
     * Desc
     *
     * @return \Instagram\Response\Partials\Media[] | \Doctrine\Common\Collections\ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }

}
