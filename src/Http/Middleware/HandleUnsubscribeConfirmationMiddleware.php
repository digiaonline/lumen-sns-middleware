<?php

namespace Digia\Lumen\SnsMiddleware\Http\Middleware;

use Digia\Lumen\SnsMiddleware\MessageTypeEnum;

/**
 * Class HandleUnsubscribeConfirmationMiddleware
 * @package Digia\Lumen\SnsMiddleware\Http\Middleware
 */
class HandleUnsubscribeConfirmationMiddleware extends AbstractMessageHandlerMiddleware
{

    /**
     * @inheritdoc
     */
    protected function getMessageType(): string
    {
        return MessageTypeEnum::UNSUBSCRIBE_CONFIRMATION;
    }

}
