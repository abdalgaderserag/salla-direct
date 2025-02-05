<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Salla
{

    protected $headers = [];

    protected $token;

    public function __construct($token = null)
    {
        $this->setHeaders($token);
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
                # code...
                break;
        }
        $response = Http::withHeaders($this->headers)->get($url)->throw();
        return $response->json();
    }

    protected function setHeaders($token)
    {
        if (empty($token))
            $token = Auth::user()->sallaAccessToken->access_token;

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];
        $this->token = $token;
        $this->headers = $headers;
    }
}
