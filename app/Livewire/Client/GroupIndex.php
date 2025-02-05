<?php

namespace App\Livewire\Client;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class GroupIndex extends Component
{
    public $groups;

    public function render()
    {
        return view('livewire.client.group-index');
    }

    public function getGroups() {
        $user = Auth::user();
        $accessToken = $user->sallaAccessToken;

        // Fetch clients from the database
        $localGroups = Group::where('store_id', $user->active_id)->get();

        // API call
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken
        ];

        $response = Http::withHeaders($headers)
            ->get('https://api.salla.dev/admin/v2/customers/groups')
            ->throw();

        $groupsData = $response->json('data');

        foreach ($groupsData as $apiClient) {
            // Find existing client
            $localClient = $groupsData->where(['client_id' => $apiClient['id'],'store_id' => $user->active_id])->first();

            // Prepare data
            $data = [
                'store_id' => $user->active_id,

            ];

            // Create or update
            if (!$localClient) {
                Group::create($data);
            } else {
                $localClient->update($data);
            }
        }

        // Refresh the clients list
        $this->groups = Group::where('store_id', $user->active_id)->get();
    }
}
