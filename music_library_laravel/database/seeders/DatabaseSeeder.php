<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artist;
use App\Models\Genre;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        User::truncate();
        Song::truncate();
        Artist::truncate();
        Genre::truncate();

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $genre1 = Genre::factory()->create();
        $genre2 = Genre::factory()->create();
        $genre3 = Genre::factory()->create();

        $artist1 = Artist::factory()->create();
        $artist2 = Artist::factory()->create();
        $artist3 = Artist::factory()->create();

        Song::factory(2)->create([
            'user_id' => $user1->id,
            'genre_id' => $genre1->id,
            'artist_id' => $artist1->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user1->id,
            'genre_id' => $genre2->id,
            'artist_id' => $artist1->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user1->id,
            'genre_id' => $genre3->id,
            'artist_id' => $artist1->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user1->id,
            'genre_id' => $genre2->id,
            'artist_id' => $artist2->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user1->id,
            'genre_id' => $genre3->id,
            'artist_id' => $artist2->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user1->id,
            'genre_id' => $genre2->id,
            'artist_id' => $artist3->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user1->id,
            'genre_id' => $genre3->id,
            'artist_id' => $artist3->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user2->id,
            'genre_id' => $genre1->id,
            'artist_id' => $artist1->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user2->id,
            'genre_id' => $genre2->id,
            'artist_id' => $artist1->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user2->id,
            'genre_id' => $genre3->id,
            'artist_id' => $artist1->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user2->id,
            'genre_id' => $genre2->id,
            'artist_id' => $artist2->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user2->id,
            'genre_id' => $genre3->id,
            'artist_id' => $artist2->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user2->id,
            'genre_id' => $genre2->id,
            'artist_id' => $artist3->id
        ]);
        Song::factory(2)->create([
            'user_id' => $user2->id,
            'genre_id' => $genre3->id,
            'artist_id' => $artist3->id
        ]);
    }
}
