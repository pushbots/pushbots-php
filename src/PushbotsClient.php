<?php
/**
* PushBots
*
* PushBots official PHP package 1.2
*
* @copyright 2018 Abdullah Diaa <abdullah@pushbots.com>
* @license   http://www.opensource.org/licenses/mit-license.php MIT
* @link      https://pushbots.com
*/

namespace Pushbots;
    
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
    
/**
 * Creates PushbotsClient using Application ID and secret
 *
 */
class PushbotsClient
{
    /**
     * @var Client $_client Pushbots Guzzle client
     */
    private $_client;
    
    /**
     * @var string Pushbots application Id
     */
    protected $applicationId;
    
    /**
     * @var string Pushbots application secret
     */
    protected $applicationSecret;
    
    /**
     * @var PushbotsCampaign $campaign Sends Campaign using pushbots API
     */
    public $campaign;
    
    /**
     * @var PushbotsTransactional $$transactional Sends a notification to single user using Pushbots API.
     */
    public $transactional;
    
    /**
     * PushbotsClient constructor.
     *
     * @param string $applicationId     App ID.
     * @param string $applicationSecret App Secret.
     */
    public function __construct($applicationId, $applicationSecret)
    {
        $this->_setClient();
        $this->campaign = new PushbotsCampaign($this);
        $this->transactional = new PushbotsTransactional($this);
        
        $this->applicationId = $applicationId;
        $this->applicationSecret = $applicationSecret;
    }
    
    /**
     *  Sets guzzle Client
     *
     * @return void
     */
    private function _setClient()
    {
        $this->_http_client = new Client();
    }
	
	/**
	* Sets GuzzleHttp client.
	*
	* @param Client $client
	*/
	public function setPushbotsClient($client)
	{
		$this->http_client = $client;
	}
    
    /**
     * Returns pushbots application Id
     *
     * @return array
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }
    
    
    /**
     * Returns pushbots application secret
     *
     * @return array
     */
    public function getApplicationSecret()
    {
        return $this->applicationSecret;
    }
        
    /**
     * Sends request to Pushbots API.
     *
     * @param  string $endpoint
     * @param  string $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($endpoint, $json)
    {
        $guzzleRequestOptions = [
        'json' => $json,
        'headers' => [
        'Accept' => 'application/json',
        'x-pushbots-appid'     => $this->getApplicationId(),
        'x-pushbots-secret'     => $this->getApplicationSecret()
        ],
        ];
        $response = $this->_http_client->request(
            'POST',
            "https://api.pushbots.com/$endpoint",
            $guzzleRequestOptions
        );
        return $this->_handleResponse($response);
    }
    
    
    /**
     * Handling response through GuzzleHttp stream
     *
     * @param Response $response
     * @return mixed
     */
    private function _handleResponse(Response $response)
    {    
        $stream = \GuzzleHttp\Psr7\stream_for($response->getBody());
        $data = json_decode($stream);
        return $data;
    }
    
}