# lumen-sns-middleware

[![Build Status](https://travis-ci.org/digiaonline/lumen-sns-middleware.svg?branch=main)](https://travis-ci.org/digiaonline/lumen-sns-middleware)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/digiaonline/lumen-sns-middleware/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/digiaonline/lumen-sns-middleware/?branch=main)
[![Coverage Status](https://coveralls.io/repos/github/digiaonline/lumen-sns-middleware/badge.svg?branch=main)](https://coveralls.io/github/digiaonline/lumen-sns-middleware?branch=main)

This library contains a collection of middleware and helpers for dealing with AWS SNS notifications.

## Features

* a middleware for validating the signatures of SNS notifications
* middleware for transparently handling subscription and unsubscribe confirmations
* a factory for creating SNS `Message` objects from HttpFoundation request objects (which Lumen uses)
* a basic enum class for notification types

## Requirements

* PHP >= 7.0
* Lumen >= 5.5

## Installation

Add the library as a dependency:

```bash
composer require digiaonline/lumen-sns-middleware 
```

Register the service provider:

```php
$app->register(Digia\Lumen\SnsMiddleware\Providers\SnsMiddlewareServiceProvider::class);
```

## Usage

Apply any of the following middleware to your routes:

* `MessageValidatorMiddleware` - validates requests and throws an exception they don't contain a valid SNS message
* `HandleSubscriptionConfirmationMiddleware` - automatically confirms `SubscriptionConfirmation` messages
* `HandleUnsubscribeConfirmationMiddleware` - automatically confirms `UnsubscribeConfirmation` messages

### Using a custom HTTP client

If for some reason you need to use a custom HTTP client when validating messages or confirming subscription/unsubscribe 
messages, bind an implementation of `HttpClientInterface` to your container, e.g.:

```php
$app->bind(HttpClientInterface::class, MyImplementation::class);
```

## License

MIT

## Testing

Run `composer test`
