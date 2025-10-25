<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->name(),
            'description'=>fake()->sentence(3),
//            'genre'=>fake()->randomElement(['action','drama','fantasy']),
            'poster'=>fake()->imageUrl(),
            'trailer_link'=>fake()->url(),
            'download_link'=>fake()->url(),
        ];
    }
}
