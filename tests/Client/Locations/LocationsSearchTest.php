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

namespace Instagram\Tests\Client\Locations;


use Doctrine\Common\Collections\ArrayCollection;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Location\LocationRequest;
use Instagram\Request\Location\LocationSearchRequest;
use Instagram\Response\Locations\LocationResponse;
use Instagram\Response\Locations\LocationSearchResponse;
use Instagram\Response\Partials\Location;
use Instagram\Response\Partials\Meta;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class LocationsTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testLocationSearchRequest()
    {
        $request = new LocationSearchRequest();
        $request->setFourSquareId('123');
        $request->setFourSquareV2Id('12349');
        $request->setFacebookPlaceId('123499537');

        $this->assertSame([
            'foursquare_id' => '123',
            'foursquare_v2_id' => '12349',
            'facebook_places_id' => '123499537',
        ], $request->getAttributes());
    }

    /**
     * Desc
     *
     * @return void
     */
    public function testLocation()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/locations.search.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var LocationSearchResponse $response */
        $response = $client->call(new LocationSearchRequest(['lat' => 52.5167, 'lng' => 13.3833, 'distance'=>1000]));

        $this->assertInstanceOf(LocationSearchResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());

        $locations = $response->getData();
        foreach ($locations as $location) {
            $this->assertInstanceOf(Location::class, $location);
        }


    }
}