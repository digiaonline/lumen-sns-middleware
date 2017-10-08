<?php

namespace Digia\Lumen\SnsMiddleware\Tests;

use Aws\Sns\Message;
use Digia\Lumen\SnsMiddleware\MessageFactory;
use Illuminate\Http\Request;

/**
 * Class MessageFactoryTest
 * @package Digia\Lumen\SnsMiddleware\Tests
 */
class MessageFactoryTest extends TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Failed to decode JSON: Syntax error
     */
    public function testInvalidJson()
    {
        $request = new Request([], [], [], [], [], [], '{\"foo\":\"bar\"}');

        MessageFactory::createFromRequest($request);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage "Message" is required to verify the SNS Message.
     */
    public function testInvalidMessage()
    {
        $request = new Request([], [], [], [], [], [], '{}');

        MessageFactory::createFromRequest($request);
    }

    /**
     * Checks that no exceptions are thrown when a valid message is supplied
     */
    public function testValidMessage()
    {
        $json    = $this->getResourceAsString('SubscriptionConfirmation.json');
        $request = new Request([], [], [], [], [], [], $json);

        $this->assertInstanceOf(Message::class, MessageFactory::createFromRequest($request));
    }

}
