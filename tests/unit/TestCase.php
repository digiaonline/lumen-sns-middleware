<?php

namespace Digia\Lumen\SnsMiddleware\Tests;

/**
 * Class TestCase
 * @package Digia\Lumen\SnsMiddleware\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @param string $resourceName
     *
     * @return string
     */
    protected function getResourceAsString(string $resourceName): string
    {
        return file_get_contents(__DIR__ . '/../resources/' . $resourceName);
    }

}
