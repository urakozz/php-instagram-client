<?php
/**
 * PHP Version 5
 *
 * @category  H24
 * @package   
 * @author    "Yury Kozyrev" <yury.kozyrev@home24.de>
 * @copyright 2015 Home24 GmbH
 * @license   Proprietary license.
 * @link      http://www.home24.de
 */

namespace Instagram\Response\Users;

use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Partials\Media;
use JMS\Serializer\Annotation\Type;

class SelfFeedResponse extends AbstractMediaResponse
{
    /**
     * @var Media[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Media>")
     */
    protected $data;

}