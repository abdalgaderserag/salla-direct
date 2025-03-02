<?php

namespace Database\Factories\Salla;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_id' => rand(1,9999),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'avatar' => '',
            'domain' => '',
        ];
    }
}
