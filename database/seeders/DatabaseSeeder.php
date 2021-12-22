<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Genre;
use App\Models\Movie;


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
        Movie::truncate();
        Genre::truncate();

        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $g1 = Genre::factory()->create();
        $g2 = Genre::factory()->create();
        Movie::factory(4)->create([
            'user_id' => $user->id,
            'genre_id' => $g1->id,
        ]);
        Movie::factory(3)->create([
            'user_id' => $user->id,
            'genre_id' => $g2->id,
        ]);

    }
}
