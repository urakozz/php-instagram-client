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


use Instagram\Response\Users\SelfFeedResponse;

class InitTest extends \PHPUnit_Framework_TestCase
{

    public function testInit()
    {
        $class = new SelfFeedResponse();
        $this->assertInstanceOf(SelfFeedResponse::class, $class);
    }
}