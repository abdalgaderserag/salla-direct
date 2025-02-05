<?php

namespace App\Livewire\Client\Group;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $groups = [];
    public function render()
    {
        $this->groups = Group::all()->where('store_id', '=', Auth::user()->active_id);
        return view('livewire.client.group.index');
    }
}
