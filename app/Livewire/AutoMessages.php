<?php

namespace App\Livewire;

use Livewire\Component;

class AutoMessages extends Component
{
    public function render()
    {
        return view('livewire.auto-messages');
    }

    public function active() {
        dd('test');
    }
}
