<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Group;
use App\Models\Salla\Store;
use App\Models\User;
use Exception;
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

        try{
            $u = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@gmail.com',
                'active_id' => 1
            ]);
        }catch(Exception $e){
        }

        Store::factory(1)->create([
            'user_id' => $u->id,
        ]);

        Group::factory()->create();

        Client::factory()->count(20)->create();
    }
}
