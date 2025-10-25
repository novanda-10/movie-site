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
        Genre::create(['name' => 'action']);
        Genre::create(['name' => 'comedy']);
        Genre::create(['name' => 'drama']);
        Genre::create(['name' => 'fantasy']);
        Genre::create(['name' => 'sci-fi']);
        

    }
}
