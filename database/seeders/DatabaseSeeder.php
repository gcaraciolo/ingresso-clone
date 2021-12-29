<?php

namespace Database\Seeders;

use App\Tickets\Movie;
use App\Tickets\Theater;
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
        Movie::factory()->count(50)->create();
        Theater::factory()->count(10)->hasCity()->hasRooms()->create();

        $movie = Movie::first();
        $theater = Theater::first();

        $room = $theater->rooms()->first();
        $room->newMovieSession($movie, now(), now()->addHours(2));
    }
}
