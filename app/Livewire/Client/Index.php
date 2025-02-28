<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Salla;
use Illuminate\Support\Facades\Auth;
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
        $salla = new Salla();
        $res = $salla->sendData('create.customer',json_encode($this->requestData));
        dd($res);
        $this->removeClient();
    }
}
