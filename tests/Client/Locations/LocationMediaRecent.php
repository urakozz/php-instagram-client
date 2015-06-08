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
use Instagram\Request\Location\LocationMediaRecentRequest;
use Instagram\Response\Locations\LocationMediaRecentResponse;
use Instagram\Response\Partials\Meta;
use Instagram\Response\Partials\Pagination;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class LocationMediaRecent extends \PHPUnit_Framework_TestCase
{
    use GuzzleHandlerTrait;

    public function testTagCall()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/users.userMediaRecent.json"));

        $token = '228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9';
        $config = new TokenConfig($token);
        $client = new InstagramClient($config, $this->getClient());
        $response = $client->call(new LocationMediaRecentRequest(['location_id'=>'1232112']));

        $this->assertInstanceOf(LocationMediaRecentResponse::class, $response);
        $this->assertTrue($response->isOk());
        $this->assertEquals(200, $response->getCode());
        $this->assertNull($response->getErrorType());
        $this->assertNull($response->getErrorMessage());
        $this->assertInstanceOf(Meta::class, $response->getMeta());
        $this->assertInstanceOf(Pagination::class, $response->getPagination());
        $this->assertInstanceOf(ArrayCollection::class, $response->getData());
    }
}