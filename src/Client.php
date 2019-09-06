<?php
namespace Invoisoft\ApiClient;

class Client
{
    public function __construct(string $apiKey, string $endPoint)
    {
        $this->apiKey = $apiKey;
        $this->endPoint = $endPoint;
    }

    public function execute($path, $payload = array())
    {
        // Initiate client
        $client = new \GuzzleHttp\Client();

        // Make the request
        $response = $client->post($this->endPoint . '/' . $path, array(
            'form_params' => $payload
        ));

        // Grab the response
        $body = $response->getBody();

        return json_decode($body);
    }
}