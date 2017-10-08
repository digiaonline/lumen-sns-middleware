<?php

namespace Digia\Lumen\SnsMiddleware;

use Aws\Sns\Message;
use Digia\JsonHelpers\JsonDecoder;
use Illuminate\Http\Request;

/**
 * Class MessageFactory
 * @package Digia\Lumen\SnsMiddleware
 */
class MessageFactory
{

    /**
     * @param Request $request
     *
     * @return Message
     *
     * @throws \InvalidArgumentException
     */
    public static function createFromRequest(Request $request): Message
    {
        return new Message(JsonDecoder::decode((string)$request->getContent(), true));
    }

}
