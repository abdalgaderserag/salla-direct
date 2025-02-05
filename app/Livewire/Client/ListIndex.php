<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ListIndex extends Component
{
    public $clients = [];

    public function render()
    {
        $this->getClients();
        return view('livewire.client.list-index');
    }

    public function getClients()
    {
        // todo : make this a dayly corn job
        $user = Auth::user();
        $accessToken = $user->sallaAccessToken;

        // Fetch clients from the database
        $localClients = Client::where('store_id', $user->active_id)->get();

        // API call
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken
        ];

        $response = Http::withHeaders($headers)
            ->get('https://api.salla.dev/admin/v2/customers')
            ->throw();

        $clientsData = $response->json('data');

        foreach ($clientsData as $apiClient) {
            // Find existing client
            $localClient = $localClients->where(['client_id' => $apiClient['id'],'store_id' => $user->active_id])->first();

            // Prepare data
            $data = [
                'username'       => $apiClient['first_name'] . ' ' . $apiClient['last_name'],
                'client_id'      => $apiClient['id'],
                'store_id'       => $user->active_id,
                'groups'         => $apiClient['groups'] ?? [],
                'gender'         => $apiClient['gender'] ?? null,
                'city'           => $apiClient['city'] ?? null,
                'phone'          => '+' . ($apiClient['mobile_code'] ?? '') . ' ' . ($apiClient['mobile'] ?? ''),
                'email'          => $apiClient['email'],
                'update_date'    => $apiClient['updated_at']['date'], // Use updated_at
            ];

            // Create or update
            if (!$localClient) {
                Client::create($data);
            } else {
                $localClient->update($data);
            }
        }

        // Refresh the clients list
        $this->clients = Client::where('store_id', $user->active_id)->get();
    }
}
