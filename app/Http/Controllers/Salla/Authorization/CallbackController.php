<?php

namespace App\Http\Controllers\Salla\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Salla\Authorization\CallbackRequest;
use App\Models\Client;
use App\Models\Group;
use App\Models\Salla\SallaAccessToken;
use App\Models\Salla\Store;
use App\Models\User;
use App\Salla;
use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Fortify;

class CallbackController extends Controller
{
    public function index(CallbackRequest $request)
    {

        // Retrieve query parameters
        $code = $request->query('code');
        $scope = $request->query('scope');
        $state = $request->query('state');

        // Validate the received parameters
        // if (!$code || !$scope || $state) {
        //     return redirect()->away(config('salla.urls.auth'));
        // }

        $scope_permissions = 'offline_access';
        $redirect_url = route('salla.redirect');

        $formData = [
            'client_id' => config('salla.client.id'),
            'client_secret' => config('salla.client.secret'),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'scope' => $scope_permissions,
            'redirect_uri' => $redirect_url
        ];

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $response = Http::asForm()
            ->withHeaders($headers)
            ->post('https://accounts.salla.sa/oauth2/token', $formData);
        Log::info($response);

        if ($response->successful()) {
            $store = $this->createStore($response->json());
            return view('salla.callback');
        }

        return abort(404);
    }

    private function createStore($response)
    {
        $salla = new Salla($response['access_token']);
        $user = Auth::user();
        $storeData = $salla->getData('store');
        $storeToken = [
            'user_id' => $user->id,
            'store_id' => $storeData['id'],
            'name' => $storeData['name'],
            'email' => $storeData['email'],
            'avatar' => $storeData['avatar'],
            'domain' => $storeData['domain'],
        ];
        $store = new Store($storeToken);
        $store->save();

        // save store as active
        $user->active_id = $store->id;
        $user->save();

        //create token
        $tokenData = [
            'store_id' => $store->id,
            'access_token' => $response['access_token'],
            'refresh_token' => $response['refresh_token'],
            'expire_date' => Carbon::now()->addSeconds($response['expires_in']),
            'scope' => $response['scope']
        ];
        $salla_access_token = new SallaAccessToken($tokenData);
        $salla_access_token->save();

        // get and save customers
        // API call
        $clientsData = $salla->getData('customers');

        // loop the api data and create clients
        foreach ($clientsData as $apiClient) {
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
            Client::create($data);
        }

        // create groups
        $groupsData = $salla->getData('groups');

        foreach ($groupsData as $apiGroup) {
            // Prepare data
            $data = [
                'store_id' => $user->active_id,
                'group' => $apiGroup['id'],
                'name' => $apiGroup['name']
            ];
            Group::create($data);
        }
    }
}
