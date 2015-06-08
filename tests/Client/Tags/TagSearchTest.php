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
use Instagram\Request\Tag\TagRequest;
use Instagram\Request\Tag\TagSearchRequest;
use Instagram\Response\Partials\Tag;
use Instagram\Response\Tag\TagResponse;
use Instagram\Response\Tag\TagSearchResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class TagSearchTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testTegRequest()
    {
        $req = new TagSearchRequest();
        $req->setQ('wtf');
        $this->assertSame(['q'=>'wtf'], $req->getAttributes());
    }

    public function testTagCall()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/tag.search.json"));

        $token = '228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9';
        $config = new TokenConfig($token);
        $client = new InstagramClient($config, $this->getClient());
        $response = $client->call(new TagSearchRequest(['q'=>'wtf']));

        $this->assertInstanceOf(TagSearchResponse::class, $response);
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $tag = $response->getData()->first();
        $this->assertInstanceOf(Tag::class, $tag);
        $this->assertEquals(14369625, $tag->getMediaCount());
        $this->assertEquals('wtf', $tag->getName());
    }
}