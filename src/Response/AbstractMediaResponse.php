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

namespace Instagram\Response;

use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Type;

/**
 * PHP Version 5
 *
 * Class MediaResponse
 *
 * @package   Instagram\Response
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */
class AbstractMediaResponse extends AbstractInstagramResponse
{

    /**
     * @var ArrayCollection
     */
    protected $data;

    /**
     * @var Meta
     * @Type("Instagram\Response\Partials\Meta")
     */
    protected $meta;

    /**
     * @var Pagination
     * @Type("Instagram\Response\Partials\Pagination")
     */
    protected $pagination;

    /**
     * @return ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ArrayCollection $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param Meta $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param Pagination $pagination
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->getMeta()->getCode();
    }

    /**
     * Desc
     *
     * @return string
     */
    public function getErrorType()
    {
        return $this->getMeta()->getErrorType();
    }

    /**
     * Desc
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->getMeta()->getErrorType();
    }
}