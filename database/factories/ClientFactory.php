<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'register_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'store_id' => 1,
            'groups' => '[1111]',
            'salla_id' => random_int(0,1999),
            'isBanned' => false
        ];
    }
}
