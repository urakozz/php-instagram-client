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

namespace Instagram\Tests\Client\Users;


use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\Promise;
use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Users\UserRequest;
use Instagram\Request\Users\UserSearchRequest;
use Instagram\Response\Partials\User\UserCounts;
use Instagram\Response\Partials\UserInfo;
use Instagram\Response\Users\UserResponse;
use Instagram\Response\Users\UserSearchResponse;
use Instagram\Tests\Client\GuzzleHandlerTrait;

class UserSearchTest extends \PHPUnit_Framework_TestCase
{

    use GuzzleHandlerTrait;

    public function testUserRequest()
    {
        $request = new UserSearchRequest();
        $request->setQ('123123');
        $this->assertSame(['q'=>'123123'], $request->getAttributes());

        $request = new UserRequest(['q'=>'123123']);
        $this->assertSame(['q'=>'123123'], $request->getAttributes());
    }

    public function testUserRequestCall()
    {
        $this->createHandlerForResponse(200, file_get_contents(__DIR__ . "/../fixtures/users.search.json"));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->getClient());
        /** @var UserSearchResponse $response */
        $response = $client->call(new UserSearchRequest(['q'=>'gaga']));
        $this->assertInstanceOf(UserSearchResponse::class, $response);
        $userInfoCollection = $response->getData();
        $this->assertInstanceOf(ArrayCollection::class, $userInfoCollection);
        $userInfo = $userInfoCollection->first();
        $this->assertInstanceOf(UserInfo::class, $userInfo);
        $this->assertEquals('50918978', $userInfo->getId());
        $this->assertEquals('gagara1987', $userInfo->getUsername());
        $this->assertContains('Polina', $userInfo->getFullName());
        $this->assertContains('10665316_375135489300282_379950178_a', $userInfo->getProfilePicture());

    }
}