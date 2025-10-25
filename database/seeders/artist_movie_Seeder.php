<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class artist_movie_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artist_movie')->insert([
            ['artist_id' => 1, 'movie_id' => 1],
            ['artist_id' => 1, 'movie_id' => 3],
            ['artist_id' => 2, 'movie_id' => 3],
            ['artist_id' => 3, 'movie_id' => 1],
        ]);
    }
}
