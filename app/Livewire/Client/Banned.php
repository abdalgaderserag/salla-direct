<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Banned extends Component
{
    public $selectedBanClientIds = [];
    public $group = '', $search = '',$sort='username',$sortDir='ASC';
    #[Computed()]
    public function clients()
    {
        // todo : search how to search in json
        $clients = Client::where('store_id', Auth::user()->active_id)
            ->where('isBanned', 1);
        if ($this->group != '') {
            $clients = $clients->where('groups', $this->group);
        }
        if ($this->search != '') {
            $clients = $clients->where('username', 'like', "%{$this->search}%")->orWhere('phone', 'like', "%{$this->search}%");
        }
        return $clients->orderBy($this->sort, $this->sortDir)->paginate(10);
    }

    public function render()
    {
        $this->selectedBanClientIds = Session::get('selected_ban_clients', []);
        return view('livewire.client.banned');
    }

    public function toggleClient($clientId)
    {
        $clientId = (int) $clientId;

        $selectedClients = Session::get('selected_ban_clients', []);

        if (in_array($clientId, $selectedClients)) {
            $selectedClients = array_diff($selectedClients, [$clientId]);
        } else {
            $selectedClients[] = $clientId;
            $selectedClients = array_unique($selectedClients);
        }

        Session::put('selected_ban_clients', $selectedClients);
        $this->selectedBanClientIds = $selectedClients;
    }

    public function unBan() {
        $clients = Client::where('store_id', Auth::user()->active_id);
        foreach($this->selectedBanClientIds as $id){
            $c = $clients->where('id',$id)->first();
            $c->isBanned = false;
            $c->update();
        }
    }
}
