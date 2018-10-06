[![Build
Status](https://travis-ci.org/pushbots/pushbots-php.svg?branch=master)](https://travis-ci.org/pushbots/pushbots-php) [![Maintainability](https://api.codeclimate.com/v1/badges/46f15715f32dd218b5e6/maintainability)](https://codeclimate.com/github/pushbots/pushbots-php/maintainability)
## pushbots-php

> Official PHP package for PushBots


## Installation

Requires PHP 5.5.


Install with Composer
------------

```
$ php composer.phar require pushbots/pushbots-php
```

Then require the library in your PHP code:

```php
require "vendor/autoload.php";
```


Example
------------

```php
<?php
// load dependencies
require 'vendor/autoload.php';

use Pushbots\PushbotsClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;

$client = new PushbotsClient("APPLICATION_ID", "APPLICATION_SECRET");

try {
	//Sample sending campaign to all users
	$res = $client->campaign->send([
		//Platforms
		//0 => iOS
		//1 => Android
		//2 => Chrome
		//3 => Firefox
		//4 => Opera
		//5=> Safari
		"platform" => [0,1,2,3,4,5], 
		//Message
		"msg" => "Notification message",
		//Badge [iOS only]
		"badge"	=> "+1",
		//Notification payload
		"payload"=>[
			"key"=> "value"
		]
	]);
} catch (ClientException $e) {
    echo Psr7\str($e->getRequest());
    echo Psr7\str($e->getResponse());
}

```

Alias
------------

```php
//Sample sending campaign to an alias
$client->campaign->alias("ALIAS", "Notification message");
```


Test notification
-------------

```php
//Sample sending campaign to an alias
$client->campaign->test();
```

Exceptions
-------------

[Guzzle](http://docs.guzzlephp.org/en/stable/quickstart.html#exceptions) throws exceptions for errors that occur during a transfer.

Sending to one device [Transactional]
------------

```php
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
......
//Sample sending campaign to an alias
try {
	$client->transactional->send([
		// iOS and Android only supported
		//0 => iOS
		//1 => Android
		"platform" => 0, 
		//token
		"token" => "343aa292e2bb642db2abb24124417cdf945a03e18c9434499d0dcef8b0d7dd0f",
		//Message
		"msg" => "Notification message"
	]);
} catch (ClientException $e) {
    echo Psr7\str($e->getRequest());
    echo Psr7\str($e->getResponse());
}
```

Changelog
-------------
Version 1.2.0


Version 1.1.0
 * Add testing notification.
 * Add Push/one support.
 * Add alias support.

Version 1.0.0
 * Release PushBots PHP package
