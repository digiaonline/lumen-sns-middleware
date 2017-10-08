<?php

namespace Digia\Lumen\SnsMiddleware\Http\Client;

/**
 * Interface HttpClientInterface
 * @package Digia\Lumen\SnsMiddleware\Http\Client
 */
interface HttpClientInterface
{

    /**
     * @param string $url
     *
     * @return string
     * 
     * @throws \RuntimeException if the request fails for any reason
     */
    public function get(string $url): string;

}
