<?php

namespace App\Livewire\Client\Client;

use App\Models\Client;
use Livewire\Component;

class Index extends Component
{
    public $clients = [];
    public function render()
    {
        $this->clients = Client::all()->where('store_id', '=', Auth::user()->active_id);

        return view('livewire.client.client.index');
    }
}
