<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->colorName(),
            'album' => fake()->sentence(3, true),
            'released_in' => fake()->numberBetween(1910, 2023),
            'user_id' => User::factory(),
            'artist_id' => Artist::factory(),
            'genre_id' => Genre::factory()
        ];
    }
}
