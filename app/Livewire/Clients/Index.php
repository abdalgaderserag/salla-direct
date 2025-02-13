<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $clients = [];
    public function render()
    {
        $this->clients = Client::all()->where('store_id', '=', Auth::user()->active_id);

        return view('livewire.client.index');
    }
}
