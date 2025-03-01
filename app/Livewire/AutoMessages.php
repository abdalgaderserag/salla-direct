<?php

namespace App\Livewire;

use App\Models\Auto;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AutoMessages extends Component
{
    public $activeEvent = [];
    public $requestData = [
        'context' => '',
        'attachment' => [],
    ];
    public $showEvent = false;
    public function render()
    {
        return view('livewire.auto-messages');
    }

    public function active($event)
    {
        if ($event['type'] == '') {
            $auto = Auto::where('store_id', '=', Auth::user()->active_id)->where('event', '=', $event['event'])->first();
        } else {
            $auto = Auto::where('store_id', '=', Auth::user()->active_id)->where('type', '=', $event['type'])->first();
        }
        if (empty($auto)) {
            $message = new Message();
            $message->context = $event['message'];
            $message->save();
            $auto = new Auto();
            $auto->message_id = $message->id;
            $auto->store_id = Auth::user()->active_id;
            $auto->type = $event['type'];
            $auto->event = $event['event'];
            $auto->active = true;
            $auto->save();
        } else {
            $auto->active = ! $auto->active;
            $auto->update();
        }
    }

    function showEventWindow($event)
    {
        $this->activeEvent = $event;
        $this->showEvent = true;
    }
    function removeEventWindow()
    {
        $this->activeEvent = [];
        $this->showEvent = false;
    }

    public function save()
    {
        $event = $this->activeForm['event'];
        if ($event['type'] == '') {
            $auto = Auto::where('store_id', '=', Auth::user()->active_id)->where('event', '=', $event['event'])->first();
        } else {
            $auto = Auto::where('store_id', '=', Auth::user()->active_id)->where('type', '=', $event['type'])->first();
        }
        $auto->message->context = $this->requestData['context'];
        $auto->message->update();
    }
}
