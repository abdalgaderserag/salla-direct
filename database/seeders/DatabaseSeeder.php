<?php

namespace Database\Seeders;

use App\Models\Auto;
use App\Models\Client;
use App\Models\Group;
use App\Models\Message;
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

        $events = config('salla.events');
        foreach ($events as $event) {
            $message = new Message();
            $message->context = $event['message'];
            $message->save();
            $auto = new Auto();
            $auto->message_id = $message->id;
            $auto->store_id = 1;
            $auto->type = $event['type'];
            $auto->event = $event['event'];
            $auto->active = true;
            $auto->save();
        }

        Group::factory()->create();

        Client::factory()->count(20)->create();
    }
}
