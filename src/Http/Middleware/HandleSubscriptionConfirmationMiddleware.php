<?php

namespace Digia\Lumen\SnsMiddleware\Http\Middleware;

use Digia\Lumen\SnsMiddleware\MessageTypeEnum;

/**
 * Class HandleSubscriptionConfirmationMiddleware
 * @package Digia\Lumen\SnsMiddleware\Http\Middleware
 */
class HandleSubscriptionConfirmationMiddleware extends AbstractMessageHandlerMiddleware
{

    /**
     * @inheritdoc
     */
    protected function getMessageType(): string
    {
        return MessageTypeEnum::SUBSCRIPTION_CONFIRMATION;
    }

}
