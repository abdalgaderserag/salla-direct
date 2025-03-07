<?php

namespace App\Livewire\Campaign;

use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public $search = '', $sort = "name", $sortDir = "ASC";

    public function render()
    {
        return view('livewire.campaign.index');
    }

    #[Computed()]
    public function campaigns()
    {
        $campaigns = Campaign::where('store_id', Auth::user()->active_id);
        if ($this->search != '') {
            $campaigns = $campaigns->where('name', 'like', "%{$this->search}%");
        }
        return $campaigns->orderBy($this->sort, $this->sortDir)->paginate(10);
    }

    public function deleteCamp($id)
    {
        $c = Campaign::where('id', $id)->first();
        $c->delete();
    }
}
