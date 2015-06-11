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


use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Location\LocationRequest;
use Instagram\Response\Locations\LocationResponse;
use Instagram\Response\Partials\Location;
use Instagram\Response\Partials\Meta;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class LocationsTest extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testLocationRequest()
    {
        $request = new LocationRequest();
        $request->setLocationId('999999537539417466');

        $this->assertSame([
            'location_id' => '999999537539417466',
        ], $request->getAttributes());
    }

    public function testLocarionPartial()
    {
        $location = new Location();
        $location->setId(1);
        $location->setLatitude(2);
        $location->setLongitude(3);
        $location->setName(4);

        $this->assertEquals(1, $location->getId());
        $this->assertEquals(2, $location->getLatitude());
        $this->assertEquals(3, $location->getLongitude());
        $this->assertEquals(4, $location->getName());

    }

    public function testLocation()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/locations.get.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var LocationResponse $response */
        $response = $client->call(new LocationRequest(['location_id' => '1231221']));

        $this->assertInstanceOf(LocationResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Location::class, $response->getData());

        $location = $response->getData();
        $this->assertEquals('1231221', $location->getId());
        $this->assertEquals('San pacho', $location->getName());
        $this->assertEquals(23.32, $location->getLatitude());
        $this->assertEquals(12.21, $location->getLongitude());
    }
}