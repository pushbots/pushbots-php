<?php

namespace Pushbots;

class PushbotsBatch
{
    /**
     * @var PushbotsClient
     */
    private $_client;

    /**
     * PushbotsBatch constructor.
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
     * @see    https://developer.pushbots.com/docs#campaign_push_notification
     * @param  array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($options)
    {
        return $this->_client->post("3/push/campaign", $options);
    }
    
}
