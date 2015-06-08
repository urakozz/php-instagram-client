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


use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Tag\TagRequest;
use Instagram\Response\Partials\Tag;
use Instagram\Response\Tag\TagResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class TagTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testTegRequest()
    {
        $req = new TagRequest();
        $req->setTagName('tagname');
        $this->assertSame(['tag_name'=>'tagname'], $req->getAttributes());
    }

    public function testTagPartial()
    {
        $res = new Tag();
        $res->setMediaCount(123);
        $res->setName("name");
        $this->assertEquals(123, $res->getMediaCount());
        $this->assertEquals("name", $res->getName());
    }

    public function testTagCall()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/tag.get.json"));

        $token = '228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9';
        $config = new TokenConfig($token);
        $client = new InstagramClient($config, $this->getClient());
        $response = $client->call(new TagRequest(['tag_name'=>'tagname']));

        $this->assertInstanceOf(TagResponse::class, $response);
        $this->assertEquals(5611, $response->getData()->getMediaCount());
        $this->assertEquals("tagname", $response->getData()->getName());
    }
}