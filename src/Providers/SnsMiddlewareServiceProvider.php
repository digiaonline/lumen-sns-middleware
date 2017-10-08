<?php

namespace Digia\Lumen\SnsMiddleware\Providers;

use Digia\Lumen\SnsMiddleware\Http\Client\FileGetContentsHttpClient;
use Digia\Lumen\SnsMiddleware\Http\Client\HttpClientInterface;
use Illuminate\Support\ServiceProvider;
use Jalle19\Laravel\LostInterfaces\Providers\ServiceProvider as ServiceProviderInterface;

/**
 * Class SnsMiddlewareServiceProvider
 * @package Digia\Lumen\SnsMiddleware\Providers
 */
class SnsMiddlewareServiceProvider extends ServiceProvider implements ServiceProviderInterface
{

    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->app->bind(HttpClientInterface::class, FileGetContentsHttpClient::class);
    }

    /**
     * @inheritdoc
     */
    public function boot()
    {

    }

}
