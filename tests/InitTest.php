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

namespace Instagram\Tests;


use Instagram\Response\Users\MediaFeed;

class InitTest extends \PHPUnit_Framework_TestCase
{

    public function testInit()
    {
        $class = new MediaFeed();
        $this->assertInstanceOf(MediaFeed::class, $class);
    }
}