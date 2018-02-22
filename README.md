## pushbots-php

> Official PHP package for PushBots


## Installation

Requires PHP 5.6.


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