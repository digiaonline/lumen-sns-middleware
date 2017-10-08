<?php

namespace Digia\Lumen\SnsMiddleware\Tests\Http\Middleware;

use Aws\Sns\Message;
use Aws\Sns\MessageValidator;
use Digia\Lumen\SnsMiddleware\Http\Middleware\MessageValidatorMiddleware;
use Digia\Lumen\SnsMiddleware\Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class MessageValidatorMiddlewareTest
 * @package Digia\Lumen\SnsMiddleware\Tests\Http\Middleware
 */
class MessageValidatorMiddlewareTest extends TestCase
{

    /**
     * @expectedException \Aws\Sns\Exception\InvalidSnsMessageException
     */
    public function testInvalidMessage()
    {
        $json               = $this->getResourceAsString('valid_SubscriptionConfirmation_message.json');
        $request            = new Request([], [], [], [], [], [], $json);
        $validationCallback = function () {
            return false;
        };

        $middleware = new MessageValidatorMiddleware(new MessageValidator($validationCallback));

        $middleware->handle($request, function () {

        });
    }

    /**
     * Tests that the middleware chain is continued if the validation succeeds
     */
    public function testValidMessage()
    {
        $json               = $this->getResourceAsString('valid_SubscriptionConfirmation_message.json');
        $request            = new Request([], [], [], [], [], [], $json);
        $validationCallback = function () {
            return false;
        };

        $middleware = new MessageValidatorMiddleware(new DummyMessageValidator($validationCallback));

        $this->assertInstanceOf(Response::class, $middleware->handle($request, function () {
            return new Response();
        }));
    }

}

/**
 * Class DummyMessageValidator
 * @package Digia\Lumen\SnsMiddleware\Http\Middleware
 */
class DummyMessageValidator extends MessageValidator
{

    /**
     * @inheritdoc
     */
    public function validate(Message $message)
    {

    }

}
