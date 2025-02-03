<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        return Group::with('clients')->get();
    }

    public function store(StoreGroupRequest $request)
    {
        $group = Group::create($request->only(['name']));
        return response()->json($group, 201);
    }

    public function show(Group $group)
    {
        return $group->load('clients');
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->only(['name']));
        return $group->fresh()->load('clients');
    }

    public function destroy(Group $group)
    {
        // Prevent deletion if group has clients
        if ($group->clients()->exists()) {
            return response()->json([
                'message' => 'Cannot delete group with associated clients'
            ], 422);
        }

        $group->delete();
        return response()->json(null, 204);
    }
}
