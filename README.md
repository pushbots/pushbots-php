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
$client->campaign->send([
	//Platforms
	"platform" => [0,1,2], 
	//Message
	"msg" => "test",
	//Badge [iOS only]
	"badge"	=> "+1",
	//Notification payload
	"payload"=>[
		"key"=> "value"
	]
]);
```



Changelog
-------------

Version 1.0.0
 * Release PushBots PHP package
