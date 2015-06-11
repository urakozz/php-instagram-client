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

namespace Instagram\Tests\Client\Geographies;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Geographies\GeographyMediaRecentRequest;
use Instagram\Response\Geographies\GeographyMediaRecentResponse;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class GeographyMediaRecentTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testSelfFeedRequest()
    {
        $request = new GeographyMediaRecentRequest();
        $request->setGeoId('123');
        $request->setMinId('111');
        $request->setCount(11);

        $this->assertSame([
            'geo_id' => '123',
            'min_id' => '111',
            'count' => 11,
        ], $request->getAttributes());
    }

    public function testMediaResponse()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/usersSelfFeed.json"));

        $token  = "228952246.d2cbeff.256ed5da07084b1cb49d089d0e210a82";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var GeographyMediaRecentResponse $response */
        $response = $client->call(new GeographyMediaRecentRequest(['geo_id'=>'123']));

        $this->assertInstanceOf(GeographyMediaRecentResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());
    }
}