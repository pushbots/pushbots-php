<?php

namespace Pushbots;

class PushbotsTransactional
{
    /**
     * @var PushbotsTransactional
     */
    private $_client;

    /**
     * PushbotsTransactional constructor.
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
     * @see    https://developer.pushbots.com/api/v2/#/Devices/pushOne
     * @param  array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($options)
    {
        return $this->_client->post("3/push/transactional", $options);
    }
}
