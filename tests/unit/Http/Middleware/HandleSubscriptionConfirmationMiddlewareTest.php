<?php

namespace Digia\Lumen\SnsMiddleware\Tests\Http\Middleware;

use Digia\Lumen\SnsMiddleware\Http\Middleware\HandleSubscriptionConfirmationMiddleware;

/**
 * Class HandleSubscriptionConfirmationMiddlewareTest
 * @package Digia\Lumen\SnsMiddleware\Tests\Http\Middleware
 */
class HandleSubscriptionConfirmationMiddlewareTest extends AbstractMessageHandlerTestCase
{

    /**
     * @inheritdoc
     */
    protected function getMessageResourceName(): string
    {
        return 'SubscriptionConfirmation.json';
    }

    /**
     * @inheritdoc
     */
    protected function getMiddlewareClassName(): string
    {
        return HandleSubscriptionConfirmationMiddleware::class;
    }

}
