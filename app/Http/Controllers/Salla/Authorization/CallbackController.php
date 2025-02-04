<?php

namespace App\Http\Controllers\Salla\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Salla\Authorization\CallbackRequest;
use App\Models\Salla\SallaAccessToken;
use App\Models\Salla\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
        if (!$code || !$scope || $state) {
            return redirect()->away(config('salla.urls.auth'));
        }

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

        $response = Http::asForm()->withHeaders($headers)->post(config('salla.urls.token'), $formData);

        if ($response->successful()) {
            $store = $this->createStore($response->json());
            return view('salla.callback');
        }

        return abort(404);
    }

    private function createStore($response)
    {
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'bearer ' . $response['access_token']
        ];

        $response = Http::withHeaders($headers)->get(config('salla.urls.store-info'));
        $storeData = $response->json();
        $storeToken = [
            'user_id' => Auth::id(),
            'store_id' => $storeData['id'],
            'name' => $storeData['name'],
            'email' => $storeData['email'],
            'avatar' => $storeData['avatar'],
            'domain' => $storeData['domain'],
        ];
        $store = new Store($storeData);
        $store->save();

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
    }
}
