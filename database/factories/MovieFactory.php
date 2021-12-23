<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Genre;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(80, 180),
            'user_id' => User::factory(),
            'genre_id' => Genre::factory(),
        ];
    }
}
