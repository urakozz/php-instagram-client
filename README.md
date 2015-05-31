# Instagram Client

[![Build Status](https://travis-ci.org/urakozz/php-instagram-client.svg?branch=master)](https://travis-ci.org/urakozz/php-instagram-client)
[![Code Climate](https://codeclimate.com/github/urakozz/php-instagram-client/badges/gpa.svg)](https://codeclimate.com/github/urakozz/php-instagram-client)
[![Test Coverage](https://codeclimate.com/github/urakozz/php-instagram-client/badges/coverage.svg)](https://codeclimate.com/github/urakozz/php-instagram-client/coverage)

## Install and run tests

```
composer install
vendor/bin/phpunit

# with coverage
vendor/bin/phpunit --coverage-html=build/logs

```

## Usage

### OAuth

#### Step 1

```php
$client = new InstagramAuth(new AuthConfig(env("I_CLIENT_ID"), env("I_CLIENT_SECRET"), "http://localhost/auth"));
$url    = $client->getOAuthUrl();

// $url === 'https://api.instagram.com/oauth/authorize/?client_id=d2cbeff4792242f7b49ea65f984a1237&response_type=code&redirect_uri=http://localhost/auth&scopes=basic
```

#### Step 2
```php
$client = new InstagramAuth(new AuthConfig(env("I_CLIENT_ID"), env("I_CLIENT_SECRET"), "http://localhost/auth"));
$token  = $client->retrieveOAuthToken($_GET['code']);

```

### Subscriptions

#### Get subscriptions

```php

$client = new InstagramClient(new TokenConfig($token));
/** @var GetSubscriptionsResponse $response */
$response = $client->call(new GetSubscriptionsRequest());

```

#### Handle subscription request from the Instagram

```php
$config  = new AuthConfig("d2cbeff4792242f7b49ea65f984a1237", "f95c2c4cd80348258685d04b68ce0b64", "http://localhost/auth");
$reactor = new SubscriptionReactor($config);
$reactor->registerCallback("user", function(RealTimeSubscription $subscription){
    // Do something
});

$reactor->process($this->json, $_SERVER['HTTP_X_HUB_SIGNATURE']);
// $_SERVER['HTTP_X_HUB_SIGNATURE'] - it is just header "X-Hub-Signature"

```






