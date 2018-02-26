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

$client = new PushbotsClient("APPLICATION_ID", "APPLICATION_SECRET");

//Sample sending campaign to all users
$client->campaign->send([
	//Platforms
	//0 => iOS
	//1 => Android
	//2 => Chrome
	//3 => Firefox
	//4 => Safari
	"platform" => [0,1,2,3,4], 
	//Message
	"msg" => "Notification message"
	//Badge [iOS only]
	"badge"	=> "+1",
	//Notification payload
	"payload"=>[
		"key"=> "value"
	]
]);

```

Alias
------------

```php
//Sample sending campaign to an alias
$client->campaign->alias("ALIAS", "Notification message");
```


Test notification
------------

```php
//Sample sending campaign to an alias
$client->campaign->test();
```

Sending to one device [Transactional]
------------

```php
//Sample sending campaign to an alias
$client->transactional->send([
	// iOS and Android only supported
	//0 => iOS
	//1 => Android
	"platform" => 0, 
	//token
	"token" => "71e7aef2f01d055b11c958dc48d06a655541b054196dd33b071777e1557dcb48",
	//Message
	"msg" => "Notification message"
]);
```

Changelog
-------------

Version 1.1.0
 * Add testing notification.
 * Add Push/one support.
 * Add alias support.

Version 1.0.0
 * Release PushBots PHP package
