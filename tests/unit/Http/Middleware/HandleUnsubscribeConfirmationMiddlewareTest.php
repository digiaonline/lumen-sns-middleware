<?php

namespace Digia\Lumen\SnsMiddleware\Tests\Http\Middleware;

use Digia\Lumen\SnsMiddleware\Http\Middleware\HandleUnsubscribeConfirmationMiddleware;

/**
 * Class HandleUnsubscribeConfirmationMiddlewareTest
 * @package Digia\Lumen\SnsMiddleware\Tests\Http\Middleware
 */
class HandleUnsubscribeConfirmationMiddlewareTest extends AbstractMessageHandlerTestCase
{

    /**
     * @inheritdoc
     */
    protected function getMessageResourceName(): string
    {
        return 'UnsubscribeConfirmation.json';
    }

    /**
     * @inheritdoc
     */
    protected function getMiddlewareClassName(): string
    {
        return HandleUnsubscribeConfirmationMiddleware::class;
    }
}
