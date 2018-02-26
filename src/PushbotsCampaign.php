<?php

namespace Pushbots;

class PushbotsCampaign
{
    /**
     * @var PushbotsClient
     */
    private $_client;

    /**
     * PushbotsCampaign constructor.
     *
     * @param PushbotsClient $client
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * Sends a notification [v1]
     *
     * @see    https://developer.pushbots.com/api/v2/#/Devices/pushBatch
     * @param  array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($options)
    {
        return $this->_client->post("push/all", $options);
    }
	
    /**
     * Sends a notification using alias [v1]
     *
     * @param  string $alias Alias
     * @param  string $msg Notification message
     * @param  string $payload
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function alias($alias, $msg, $payload = [])
    {
        return $this->_client->post("push/all", ["platform" => [0,1,2,3,4], "alias" => $alias, "msg" => $msg, "payload"=> $payload]);
    }
	
    /**
     * Sends a test notification to test devices [v1]
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function test()
    {
        return $this->_client->post("push/all", ["platform" => [0,1,2,3,4], "alias" => "PB_TESTING_DEVICE", "msg" => "Testing notification from PushBots"]);
    }
}
