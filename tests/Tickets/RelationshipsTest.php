<?php

namespace Tests\Feature;

use App\Models\User;
use App\Tickets\Booking;
use App\Tickets\Movie;
use App\Tickets\Room;
use App\Tickets\Theater;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_movie_theater()
    {
        $movie = Movie::factory()->create();
        $theater = Theater::factory()->hasRooms()->create();
        $theater->rooms()->first()->newMovieSession($movie, now(), now()->addHours(2));

        $this->assertEquals(1, $theater->rooms()->first()->sessions()->count());
    }

    public function test_booking_seat()
    {
        $movie = Movie::factory()->create();
        $theater = Theater::factory()->hasRooms(['total_seats' => 2])->create();
        $room = $theater->rooms()->first();
        $movieSession = $room->newMovieSession($movie, now(), now()->addHours(2));

        $this->assertEquals(2, $movieSession->seats_available);

        $movieSession->bookTo(User::factory()->create());

        $this->assertEquals(1, $movieSession->seats_available);

        $this->assertEquals(1, Booking::count());
    }

    public function test_list_theaters_and_sessions()
    {
        $movie = Movie::factory()->create();
        $theater = Theater::factory()->hasRooms(3)->create();
        $theater->rooms()->first()->newMovieSession($movie, now(), now()->addHours(2));

        $theaters = Theater::showingMovie($movie)->where('city_id', $theater->city_id)->get();

        $this->assertEquals(1, $theaters->count());
    }
}
