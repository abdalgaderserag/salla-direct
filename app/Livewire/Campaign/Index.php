<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $campaigns = [];

    public function render()
    {
        $this->campaigns = Campaign::all()->where('store_id','=',Auth::user()->active_id);
        return view('livewire.campaign.index');
    }
}
