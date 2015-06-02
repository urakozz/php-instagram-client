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

namespace Instagram\Tests\Response\Partials\Users;


use Instagram\Response\Partials\User\UserCounts;

class UserCountsTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
        $data = new UserCounts();
        $data->setMedia(12);
        $data->setFollowedBy(13);
        $data->setFollows(14);

        $this->assertEquals(12, $data->getMedia());
        $this->assertEquals(13, $data->getFollowedBy());
        $this->assertEquals(14, $data->getFollows());

    }
}