<?php

namespace Digia\Lumen\SnsMiddleware\Tests\Http\Middleware;

use Digia\Lumen\SnsMiddleware\Http\Client\HttpClientInterface;
use Digia\Lumen\SnsMiddleware\Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Jalle19\Laravel\LostInterfaces\Http\Middleware\Middleware;

/**
 * Class AbstractMessageHandlerTestCase
 * @package Digia\Lumen\SnsMiddleware\Tests\Http\Middleware
 */
abstract class AbstractMessageHandlerTestCase extends TestCase
{

    /**
     * @return string
     */
    abstract protected function getMessageResourceName(): string;

    /**
     * @return string
     */
    abstract protected function getMiddlewareClassName(): string;

    /**
     *
     */
    public function testSuccess()
    {
        $json    = $this->getResourceAsString($this->getMessageResourceName());
        $request = new Request([], [], [], [], [], [], $json);

        $httpClient = $this->getMockedHttpClient();
        $httpClient->expects($this->once())
                   ->method('get')
                   ->with('https://sns.us-west-2.amazonaws.com/?Action=ConfirmSubscription&TopicArn=arn:aws:sns:us-west-2:123456789012:MyTopic&Token=2336412f37fb687f5d51e6e241d09c805a5a57b30d712f794cc5f6a988666d92768dd60a747ba6f3beb71854e285d6ad02428b09ceece29417f1f02d609c582afbacc99c583a916b9981dd2728f4ae6fdb82efd087cc3b7849e05798d2d2785c03b0879594eeac82c01f235d0e717736');

        $className = $this->getMiddlewareClassName();

        /** @var Middleware $middleware */
        $middleware = new $className($httpClient);
        $this->assertInstanceOf(Response::class, $middleware->handle($request, function () {

        }));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFailure()
    {
        $json    = $this->getResourceAsString($this->getMessageResourceName());
        $request = new Request([], [], [], [], [], [], $json);

        $httpClient = $this->getMockedHttpClient();
        $httpClient->expects($this->once())
                   ->method('get')
                   ->with('https://sns.us-west-2.amazonaws.com/?Action=ConfirmSubscription&TopicArn=arn:aws:sns:us-west-2:123456789012:MyTopic&Token=2336412f37fb687f5d51e6e241d09c805a5a57b30d712f794cc5f6a988666d92768dd60a747ba6f3beb71854e285d6ad02428b09ceece29417f1f02d609c582afbacc99c583a916b9981dd2728f4ae6fdb82efd087cc3b7849e05798d2d2785c03b0879594eeac82c01f235d0e717736')
                   ->willThrowException(new \RuntimeException());

        $className = $this->getMiddlewareClassName();

        /** @var Middleware $middleware */
        $middleware = new $className($httpClient);
        $middleware->handle($request, function () {

        });
    }

    /**
     * @return HttpClientInterface|\PHPUnit_Framework_MockObject_MockObject $httpClient
     */
    protected function getMockedHttpClient()
    {
        return $this->getMockBuilder(HttpClientInterface::class)
                    ->setMethods(['get'])
                    ->getMock();
    }

}
