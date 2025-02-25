<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Banned extends Component
{
    public $clients = [];
    public function render()
    {
        $this->clients = Client::all()->where('store_id', '=', Auth::user()->active_id)->map(function($client){
            return $client->isBanned;
        });
        return view('livewire.client.banned');
    }
}
