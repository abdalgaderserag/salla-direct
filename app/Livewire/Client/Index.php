<?php

namespace App\Livewire\Client;

use App\Models\Campaign;
use App\Models\Client;
use App\Models\Group;
use App\Salla;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $selectedClientIds = [];
    public $select_list_input = false, $showClientWindow = false, $campForm = false;
    public $group = '', $search = '', $sort = 'username', $sortDir = 'ASC';
    public $requestData = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'birthday' => '',
        'gender' => '',
        'phone' => ''
    ];

    public $campData = [
        'name' => '',
        'time' => '',
    ];

    #[Computed()]
    public function clients()
    {
        // todo : search how to search in json
        $clients = Client::where('store_id', Auth::user()->active_id)
            ->where('isBanned', 0);
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
        $this->selectedClientIds = Session::get('selected_clients', []);
        $groups = Group::where('store_id', Auth::user()->active_id)->get();
        return view('livewire.client.index', [
            'groups' => $groups,
        ]);
    }

    public function sortBy($type)
    {
        if ($this->sort == $type) {
            $this->sortDir = $this->sortDir == 'DESC' ? 'ASC' : 'DESC';
        }
        $this->sort = $type;
    }

    public function selectAll()
    {
        $this->selectedClientIds = [];
        $selectedClients = [];
        Session::remove('selected_clients');
        if ($this->select_list_input) {
            foreach ($this->clients as $client) {
                $selectedClients[] = $client->id;
            }
            Session::put('selected_clients', $selectedClients);
        }
    }

    public function toggleClient($clientId)
    {
        $clientId = (int) $clientId;

        if ($this->select_list_input) {
            $this->select_list_input = false;
        }

        $selectedClients = Session::get('selected_clients', []);

        if (in_array($clientId, $selectedClients)) {
            $selectedClients = array_diff($selectedClients, [$clientId]);
        } else {
            $selectedClients[] = $clientId;
            $selectedClients = array_unique($selectedClients);
        }

        Session::put('selected_clients', $selectedClients);
        $this->selectedClientIds = $selectedClients;
    }

    public function addClient()
    {
        $this->showClientWindow = true;
    }

    public function removeClient()
    {
        $this->showClientWindow = false;
        $this->reset(['requestData']);
    }

    public function save()
    {
        // $salla = new Salla();
        $res = $this->createCustomer($this->requestData);
        dd($res);
        $this->removeClient();
    }

    public function createCustomer(array $customerData)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . Auth::user()->sallaAccessToken->access_token,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])->post('https://api.salla.dev/admin/v2/customers', [
                'first_name' => $customerData['first_name'],
                'last_name' => $customerData['last_name'],
                'email' => $customerData['email'],
                'mobile' => $customerData['phone'],
                'gender' => $customerData['gender'],
                'birthday' => $customerData['birthday'],
                'notes' => 'Created via Laravel Integration'
            ]);

            if ($response->failed()) {
                Log::error('Salla API Error', [
                    'status' => $response->status(),
                    'response' => $response->json()
                ]);
                throw new \Exception('Failed to create Salla customer: ' . $response->body());
            }

            return $response->json('data');
        } catch (\Exception $e) {
            Log::error('Salla Service Error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function showCampForm()
    {
        $this->campForm = true;
    }

    public function hideCampForm()
    {
        $this->campForm = false;
    }

    public function createCampaign()
    {
        $campaign = new Campaign();
        $campaign->clients = $this->selectedClientIds;
        $campaign->name = $this->campData['name'];
        $campaign->store_id = Auth::user()->active_id;
        $campaign->activated_at = Carbon::now();
        $campaign->time_lapse = $this->campData['time'];
        $campaign->status = true;
        $campaign->save();
    }
}
