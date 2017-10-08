<?php

namespace Digia\Lumen\SnsMiddleware\Tests\Http\Client;

use Digia\Lumen\SnsMiddleware\Http\Client\FileGetContentsHttpClient;
use Digia\Lumen\SnsMiddleware\Tests\TestCase;

/**
 * Class FileGetContentsHttpClientTest
 * @package Digia\Lumen\SnsMiddleware\Tests\Http\Client
 */
class FileGetContentsHttpClientTest extends TestCase
{

    /**
     *
     */
    public function testRequestSuccess()
    {
        $httpClient = new FileGetContentsHttpClient();
        $contents   = $httpClient->get(__FILE__);

        $this->assertNotEmpty($contents);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Failed to perform HTTP request
     */
    public function testRequestFailure()
    {
        $httpClient = new FileGetContentsHttpClient();
        $httpClient->get('/some/non/existing/file');
    }

}
