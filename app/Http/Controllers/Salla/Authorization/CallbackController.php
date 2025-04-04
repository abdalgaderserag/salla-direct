<?php

namespace App\Http\Controllers\Salla\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Salla\Authorization\CallbackRequest;
use App\Models\Auto;
use App\Models\Client;
use App\Models\Group;
use App\Models\Message;
use App\Models\Salla\SallaAccessToken;
use App\Models\Salla\Store;
use App\Salla;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

class CallbackController extends Controller
{


    public function index(CallbackRequest $request)
    {
        // Retrieve query parameters
        if (!Auth::check()) {
            session()->put('salla_callback_url', $request->fullUrl());
            return redirect()->route('register');
        }
        session()->put('code', $request->query('code'));
        //        $scope = $request->query('scope');
        //        $state = $request->query('state');

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
            'code' => session('code'),
            'scope' => $scope_permissions,
            'redirect_uri' => $redirect_url
        ];

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $client = new GuzzleClient();

        try {
            $response = $client->post('https://accounts.salla.sa/oauth2/token', [
                'headers' => $headers,
                'form_params' => $formData
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if ($response->getStatusCode() === 200) {
                $this->createStore($responseBody);
                return view('salla.callback');
            }
        } catch (RequestException $e) {
            Log::error('Guzzle Request Exception: ' . $e->getMessage());
            if ($e->hasResponse()) {
                Log::error('Guzzle Response: ' . $e->getResponse()->getBody());
            }
        }

        return abort(404);
    }

    private function createStore($response)
    {
        $salla = new Salla($response['access_token']);
        $user = Auth::user();
        $storeData = $salla->getData('store');
        $storeData = $storeData['data'];
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

        Log::info($clientsData);
        // loop the api data and create clients
        $allGroups = Group::where('store_id', $store->id);
        foreach ($clientsData['data'] as $apiClient) {
            $groups = $apiClient['groups'] ?? [];
            // Prepare data
            $data = [
                'username'       => $apiClient['first_name'] . ' ' . $apiClient['last_name'],
                'salla_id'       => $apiClient['id'],
                'store_id'       => $user->active_id,
                'groups'         => json_encode($groups),
                'gender'         => $apiClient['gender'] ?? null,
                'city'           => $apiClient['city'] ?? null,
                'phone'          => ($apiClient['mobile_code'] ?? '') . ' ' . ($apiClient['mobile'] ?? ''),
                'email'          => $apiClient['email'],
                'register_date'    => $apiClient['updated_at']['date'],
            ];

            $cli = Client::create($data);

            // todo : check $group
            // foreach ($groups as $group) {
            //     $g = $allGroups->where('group', $group)->first();
            //     if (empty($g)) {
            //         $g = new Group();
            //         $g->store_id = $store->id;
            //         $g->group = $group;
            //         $g->clients = [$cli->id];
            //         $g->name = $group;
            //         $g->save();
            //     } else {
            //         $g->clients = array_push($g->clients, $cli->id);
            //         $g->update();
            //     }
            // }
        }

        // create groups
        $groupsData = $salla->getData('groups');

        foreach ($groupsData['data'] as $apiGroup) {
            // Prepare data
            $data = [
                'store_id' => $user->active_id,
                'group' => $apiGroup['id'],
                'name' => $apiGroup['name']
            ];
            Group::create($data);
        }

        //create auto messages
        $events = config('salla.events');
        foreach ($events as $event) {
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
        }
    }
}
