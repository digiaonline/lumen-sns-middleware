<?php

namespace Digia\Lumen\SnsMiddleware\Http\Client;

/**
 * Class FileGetContentsHttpClient
 * @package Digia\Lumen\SnsMiddleware\Http\Client
 */
class FileGetContentsHttpClient implements HttpClientInterface
{

    /**
     * @inheritdoc
     */
    public function get(string $url): string
    {
        $contents = @file_get_contents($url);

        if ($contents === false) {
            throw new \RuntimeException('Failed to perform HTTP request');
        }

        return $contents;
    }

}
