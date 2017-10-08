<?php

namespace Digia\Lumen\SnsMiddleware\Http\Middleware;

use Closure;
use Digia\Lumen\SnsMiddleware\Http\Client\HttpClientInterface;
use Digia\Lumen\SnsMiddleware\MessageFactory;
use Illuminate\Http\Request;
use Jalle19\Laravel\LostInterfaces\Http\Middleware\Middleware;

/**
 * Class AbstractMessageHandlerMiddleware
 * @package Digia\Lumen\SnsMiddleware\Http\Middleware
 */
abstract class AbstractMessageHandlerMiddleware implements Middleware
{

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @return string
     */
    abstract protected function getMessageType(): string;

    /**
     * HandleSubscriptionConfirmationMiddleware constructor.
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @inheritdoc
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function handle(Request $request, Closure $next)
    {
        $message = MessageFactory::createFromRequest($request);

        if ($message['Type'] === $this->getMessageType()) {
            $this->httpClient->get($message['SubscribeURL']);
        }

        return $next($request);
    }
}
