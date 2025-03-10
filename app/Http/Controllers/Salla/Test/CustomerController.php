<?php

namespace App\Http\Controllers\Salla\Test;

use App\Http\Controllers\Controller;
use App\Salla;
use Faker\Factory;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $access_token = 'EAAQt7cNZBsFcBOy6IiyDCLPdraZCghCGLZCrEOYGhV4OOavzHWBFAR7RoAzlrAdRY0ZAm4HmHfH8QFe3WBVQcjxvCNH1VbCgZA57wjjiDdFRIOicxX1fNj3gb0qaOlZC0RyLf9qhrsKZAA6IATW7niiPPyh11XS2ejFSYZAHveFhahhu5dF25UVEgoG38WaU6xZAmZCQZDZD';
        $response = $client->post(
            "https://graph.facebook.com/v22.0/614741461713399/messages",
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'messaging_product' => 'whatsapp',
                    'to' => '+249961724811',
                    'type' => 'text',
                    'text' => [
                        'body' => 'test',
                        'preview_url' => true
                    ]
                ]
            ]
        );

        return 'test';
        $user = Auth::user();
        $salla = new Salla($user->store->sallaAccessToken->access_token);
        $faker = Factory::create();

        $data = [
            "first_name" => $faker->firstName,
            "last_name" => $faker->lastName,
            "mobile" => $faker->numerify('#########'),
            "mobile_code_country" => "+967",
            "country_code" => $faker->randomElement(["SA", "US", "AE", "EG"]),
            "gender" => $faker->randomElement(["male", "female"]),
            "birthday" => $faker->date("Y-m-d", "-18 years"),
            "email" => $faker->safeEmail,
        ];
        $response = $salla->sendData('create.customer', json_encode($data));
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
