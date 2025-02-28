<?php

namespace App\Livewire\Layout;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Side extends Component
{
    public function render()
    {
        return view('livewire.layout.side');
    }

    public function addStore() {
        return redirect()->away(config('salla.urls.install'));
    }

    public function changeStore($id) {
        Auth::user()->active_id = $id;
    }
}
