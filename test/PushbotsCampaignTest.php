<?php
	
use Pushbots\PushbotsCampaign;
use Pushbots\PushbotsClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
	
class PushbotsCampaignTest extends PHPUnit_Framework_TestCase
{
	public function testCampaignSend()
	{
		$stub = $this->getMockBuilder('Pushbots\PushbotsClient')->disableOriginalConstructor()->getMock();
		$stub->method('send')->willReturn(null);
	
		$campaign = new PushbotsCampaign($stub);
		$this->assertEquals(null, $campaign->send([]));
	}
}