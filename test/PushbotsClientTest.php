<?php
	
use Pushbots\PushbotsClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
	
class PushbotsClientTest extends PHPUnit_Framework_TestCase
{
	public function testClient()
	{
		$mock = new MockHandler(
		[
			new Response(200)
				]
		);
	
		$container = [];
		$history = Middleware::history($container);
		$stack = HandlerStack::create($mock);
		$stack->push($history);
	
		$http_client = new Client(['handler' => $stack]);
	
		$client = new PushbotsClient('59c2ac8f9b823a267f8b457d', '4afd06e5d29f38f1c7b58da4bc2259a2');
		$client->setPushbotsClient($http_client);
	
		$client->campaign->send(
		[
			//Platforms
			"platform" => [0,1,2], 
			//Message
			"msg" => "test"
		]
		);
	
		foreach ($container as $transaction) {
			$appID = $transaction['request']->getHeaders()['x-pushbots-appid'];
			$this->assertTrue($appID == "59c2ac8f9b823a267f8b457d");
			$appSecret = $transaction['request']->getHeaders()['x-pushbots-secret'];
			$this->assertTrue($appSecret == "4afd06e5d29f38f1c7b58da4bc2259a2");
		}
	}
}