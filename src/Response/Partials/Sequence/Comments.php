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

namespace Instagram\Response\Partials\Sequence;


use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Type;

/**
 * PHP Version 5
 *
 * Class Comments
 *
 * @package Instagram\Response\Partials\Sequence
 * @method \Instagram\Response\Partials\Caption[]|ArrayCollection getData()
 */
class Comments extends AbstractSequence
{

    /**
     * @var ArrayCollection | \Instagram\Response\Partials\Caption[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Caption>")
     */
    protected $data;

}
