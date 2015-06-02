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


use Instagram\Client\Config\TokenConfig;
use Instagram\Client\InstagramClient;
use Instagram\Request\Users\UserRequest;
use Instagram\Response\Partials\User\UserCounts;
use Instagram\Response\Partials\UserInfo;
use Instagram\Response\Users\UserResponse;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Mockery\MockInterface | \GuzzleHttp\Client
     */
    protected $client;

    public function setUp()
    {
        $this->client = \Mockery::mock('GuzzleHttp\Client[send]');

    }

    public function testUserRequest()
    {
        $request = new UserRequest();
        $request->setUserId('123123');
        $this->assertSame(['user_id'=>'123123'], $request->getAttributes());

        $request = new UserRequest(['user_id'=>'123123']);
        $this->assertSame(['user_id'=>'123123'], $request->getAttributes());
    }

    public function testUserRequestCall()
    {
        $stream = new \GuzzleHttp\Stream\BufferStream();
        $stream->write(file_get_contents(__DIR__ . "/../fixtures/users.user.json"));
        $this->client->shouldReceive('send')->andReturn(new \GuzzleHttp\Message\Response(200, [], $stream));

        $token  = "228952246.d2cbeff.cfedd3e061a4418283bea7b4b05210f9";
        $client = new InstagramClient(new TokenConfig($token), $this->client);
        /** @var UserResponse $response */
        $response = $client->call(new UserRequest(['user_id'=>'228952246']));
        $this->assertInstanceOf(UserResponse::class, $response);
        $userInfo = $response->getData();
        $this->assertInstanceOf(UserInfo::class, $userInfo);
        $this->assertEquals('228952246', $userInfo->getId());
        $this->assertEquals('urakozz', $userInfo->getUsername());
        $this->assertEquals('Yury Kozyrev', $userInfo->getFullName());
        $this->assertEquals('https://instagramimages-a.akamaihd.net/profiles/profile_228952246_75sq_1398293168.jpg', $userInfo->getProfilePicture());
        $this->assertEquals('Senior Software Engineer, Home24 AG', $userInfo->getBio());
        $this->assertEquals('http://home24.de', $userInfo->getWebsite());

        $counts = $userInfo->getCounts();
        $this->assertInstanceOf(UserCounts::class, $counts);
        $this->assertEquals(177, $counts->getMedia());
        $this->assertEquals(71, $counts->getFollowedBy());
        $this->assertEquals(56, $counts->getFollows());
    }
}