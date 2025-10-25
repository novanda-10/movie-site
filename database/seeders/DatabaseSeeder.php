<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



         User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@a.com',
             'password'=>'123456',
             'role'=>'admin'
         ]);

         User::factory()->create([
            'name' => 'a',
            'email' => 'a@a.com',
            'password'=>'123456',
            'role'=>'user'
        ]);



        $this->call(MovieSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(genre_movie_Seeder::class);
        $this->call(ArtistSeeder::class);
        $this->call(artist_movie_Seeder::class);

    }
}
