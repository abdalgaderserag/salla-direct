<?php

namespace App\Http\Controllers\Salla\Test;

use App\Http\Controllers\Controller;
use App\Salla;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $response = $salla->sendData('CreateCustomer', json_encode($data));
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
