<?php

namespace Digia\Lumen\SnsMiddleware\Tests\Http\Middleware;

use Aws\Sns\MessageValidator;
use Digia\Lumen\SnsMiddleware\Http\Middleware\MessageValidatorMiddleware;
use Digia\Lumen\SnsMiddleware\Tests\TestCase;
use Illuminate\Http\Request;

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

}
