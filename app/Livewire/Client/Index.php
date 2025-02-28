<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Salla;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public $clients = [], $selectedClientIds = [];
    public $select_list_input = false, $showClientWindow = false;
    public $requestData = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'birthday' => '',
        'gender' => '',
        'phone' => ''
    ];

    public function render()
    {
        $this->selectedClientIds = Session::get('selected_clients', []);
        $this->clients = Client::where('store_id', Auth::user()->active_id)
            ->get()
            ->reject(function ($client) {
                return $client->isBanned; // Filter out banned clients
            });

        return view('livewire.client.index');
    }

    public function selectAll()
    {
        $this->selectedClientIds = [];
        $selectedClients = [];
        Session::remove('selected_clients');
        if ($this->select_list_input) {
            foreach ($this->clients as $client) {
                $selectedClients[] = $client->id;
            }
            Session::put('selected_clients', $selectedClients);
        }
    }

    public function toggleClient($clientId)
    {
        $clientId = (int) $clientId;

        if ($this->select_list_input) {
            $this->select_list_input = false;
        }

        $selectedClients = Session::get('selected_clients', []);

        if (in_array($clientId, $selectedClients)) {
            $selectedClients = array_diff($selectedClients, [$clientId]);
        } else {
            $selectedClients[] = $clientId;
            $selectedClients = array_unique($selectedClients);
        }

        Session::put('selected_clients', $selectedClients);
        $this->selectedClientIds = $selectedClients;
    }

    public function addClient()
    {
        $this->showClientWindow = true;
    }

    public function removeClient()
    {
        $this->showClientWindow = false;
        $this->reset(['requestData']);
    }

    public function save()
    {
        // $salla = new Salla();
        $res = $this->createCustomer($this->requestData);
        dd($res);
        $this->removeClient();
    }

    public function createCustomer(array $customerData)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Auth::user()->sallaAccessToken->access_token,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])->post('https://api.salla.dev/admin/v2/customers', [
                'first_name' => $customerData['first_name'],
                'last_name' => $customerData['last_name'],
                'email' => $customerData['email'],
                'mobile' => $customerData['phone'],
                'gender' => $customerData['gender'],
                'birthday' => $customerData['birthday'],
                'notes' => 'Created via Laravel Integration'
            ]);

            if ($response->failed()) {
                Log::error('Salla API Error', [
                    'status' => $response->status(),
                    'response' => $response->json()
                ]);
                throw new \Exception('Failed to create Salla customer: '.$response->body());
            }

            return $response->json('data');

        } catch (\Exception $e) {
            Log::error('Salla Service Error: '.$e->getMessage());
            throw $e;
        }
    }
}
