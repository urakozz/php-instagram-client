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

namespace Instagram\Tests\Client\Tags;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Tag\TagMediaRecentRequest;
use Instagram\Request\Tag\TagRequest;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Response\Partials\Tag;
use Instagram\Response\Tag\TagMediaRecentResponse;
use Instagram\Response\Tag\TagResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class TagMediaRecentTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testTegRequest()
    {
        $req = new TagMediaRecentRequest();
        $req->setTagName('tagname');
        $req->setCount(123);
        $req->setMinTagId(456);
        $req->setMaxTagId(789);
        $this->assertSame([
            'tag_name'=>'tagname',
            'count'=>123,
            'min_tag_id'=>456,
            'max_tag_id'=>789,
        ], $req->getAttributes());
    }

    public function testTagCall()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/users.userMediaRecent.json"));

        $token = '228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9';
        $config = new TokenConfig($token);
        $client = new InstagramClient($config, $this->getClient());
        $response = $client->call(new TagMediaRecentRequest(['tag_name'=>'tagname']));

        $this->assertInstanceOf(TagMediaRecentResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());
    }
}