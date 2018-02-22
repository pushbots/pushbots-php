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
}
