<?php

namespace Digia\Lumen\SnsMiddleware;

/**
 * Class MessageTypeEnum
 * @package Digia\Lumen\SnsMiddleware
 */
final class MessageTypeEnum
{

    const SUBSCRIPTION_CONFIRMATION = 'SubscriptionConfirmation';
    const UNSUBSCRIBE_CONFIRMATION  = 'UnsubscribeConfirmation';
    const NOTIFICATION              = 'Notification';

}
