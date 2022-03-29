<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(100000, 1000000),
            'rooms' => $this->faker->numberBetween(2, 10),
            'bathrooms' => $this->faker->numberBetween(2, 5),
        ];
    }

    public function forUser()
    {
        return $this->state([
            'user_id' => User::inRandomOrder()->first()->id,
        ]);
    }
}
