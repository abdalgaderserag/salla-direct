<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return Client::with('group')->get();
    }

    public function store(StoreClientRequest $request)
    {

        $client = Client::create($request->all());
        return response()->json($client, 201);
    }

    public function show(Client $client)
    {
        return $client->load('group');
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());
        return $client->fresh()->load('group');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
