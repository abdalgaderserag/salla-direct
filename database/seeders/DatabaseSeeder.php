<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Group;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $groups = Group::factory()->count(5)->create();

        $groups->each(function ($group) {
            Client::factory()->count(10)->create([
                'group_id' => $group->id,
            ]);
        });
    }
}
