<?php

namespace App\Tickets;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function movieSessions()
    {
        return $this->hasMany(MovieSession::class);
    }

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function newMovieSession(Movie $movie, Carbon $startTime, Carbon $endTime): MovieSession
    {
        $movieSession = new MovieSession([
            'start_time' => $startTime,
            'end_time' => $endTime,
            'seats_available' => $this->total_seats
        ]);
        $movieSession->movie()->associate($movie);
        $this->movieSessions()->save($movieSession);
        return $movieSession;
    }
}
