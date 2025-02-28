<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

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
            case 'storeOwner':
                $url = 'https://accounts.salla.sa/oauth2/user/info';
                break;
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
            case 'create.customer':
                $url = 'https://api.salla.dev/admin/v2/customers';
                break;
            default:
                throw new \InvalidArgumentException("Invalid request type: $type");
        }

        try {
            $request = new Request('POST', $url, $this->headers, $data);
            $res = $this->client->sendAsync($request)->wait();
            return json_decode($res->getBody()->getContents(), true);
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
