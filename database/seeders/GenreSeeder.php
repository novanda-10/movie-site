<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Genre::factory(4)->create();
        Genre::create(['name' => 'Action']);
        Genre::create(['name' => 'Horror']);
        Genre::create(['name' => 'Thriller']);
        Genre::create(['name' => 'Drama']);
        Genre::create(['name' => 'Western']);
        Genre::create(['name' => 'Animation']);
        Genre::create(['name' => 'Comedy']);
        Genre::create(['name' => 'Romance']);
        Genre::create(['name' => 'Fantasy']);
        Genre::create(['name' => 'War']);
        Genre::create(['name' => 'Martial Arts']);
        Genre::create(['name' => 'sci-fi']);
        Genre::create(['name' => 'Adventure']);
        Genre::create(['name' => 'Short']);
        

    }
}
