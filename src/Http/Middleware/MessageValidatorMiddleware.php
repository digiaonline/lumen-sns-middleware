<?php

namespace Digia\Lumen\SnsMiddleware\Http\Middleware;

use Aws\Sns\MessageValidator;
use Closure;
use Digia\Lumen\SnsMiddleware\MessageFactory;
use Illuminate\Http\Request;
use Jalle19\Laravel\LostInterfaces\Http\Middleware\Middleware;

/**
 * Class MessageValidatorMiddleware
 * @package Digia\Lumen\SnsMiddleware\Http\Middleware
 */
class MessageValidatorMiddleware implements Middleware
{

    /**
     * @var MessageValidator
     */
    protected $messageValidator;

    /**
     * MessageValidatorMiddleware constructor.
     *
     * @param MessageValidator $messageValidator
     */
    public function __construct(MessageValidator $messageValidator)
    {
        $this->messageValidator = $messageValidator;
    }

    /**
     * @inheritdoc
     *
     * @throws \InvalidArgumentException
     * @throws \Aws\Sns\Exception\InvalidSnsMessageException
     */
    public function handle(Request $request, Closure $next)
    {
        $message = MessageFactory::createFromRequest($request);

        $this->messageValidator->validate($message);

        return $next($request);
    }

}
