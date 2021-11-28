<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = Genre::all();
        Movie::factory(100)->create()->each(
            function ($movies) use ($genres){
                $movies->genres()->attach($genres->random(rand(1, 3)));
            }
        );
    }
}
