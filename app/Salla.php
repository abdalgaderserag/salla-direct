<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Salla
{
    protected $headers = [];
    protected $token;
    protected $client;

    public function __construct($token = null)
    {
        $this->setHeaders($token);
        $this->client = new Client();
    }

    public function getData($type)
    {
        $url = '';
        switch ($type) {
            case 'store':
                $url = 'https://api.salla.dev/admin/v2/store/info';
                break;
            case 'customers':
                $url = 'https://api.salla.dev/admin/v2/customers';
                break;
            case 'groups':
                $url = 'https://api.salla.dev/admin/v2/customers/groups';
                break;
            default:
                throw new \InvalidArgumentException("Invalid request type: $type");
        }

        try {
            $response = $this->client->request('GET', $url, [
                'headers' => $this->headers,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            throw new \RuntimeException("Request failed: " . $e->getMessage());
        }
    }

    public function sendData($type, $data)
    {
        $url = '';
        switch ($type) {
            case 'customers':
                $url = 'https://api.salla.dev/admin/v2/customers';
                break;
            default:
                throw new \InvalidArgumentException("Invalid request type: $type");
        }

        try {
            $response = $this->client->request('POST', $url, [
                'headers' => $this->headers,
            ],$data);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            throw new \RuntimeException("Request failed: " . $e->getMessage());
        }
    }

    protected function setHeaders($token)
    {
        if (empty($token)) {
            $token = Auth::user()->sallaAccessToken->access_token;
        }

        $this->headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];
        $this->token = $token;
    }
}
