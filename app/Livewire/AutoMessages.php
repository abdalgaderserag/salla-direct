<?php

namespace App\Livewire;

use Livewire\Component;

class AutoMessages extends Component
{
    public $showEvent = false;
    public function render()
    {
        return view('livewire.auto-messages');
    }

    public function active() {
        dd('test');
    }

    function showEventWindow($title) {
        $this->showEvent = true;
    }
    function removeEventWindow() {
        $this->showEvent = false;
    }

    public function save() {

    }
}
