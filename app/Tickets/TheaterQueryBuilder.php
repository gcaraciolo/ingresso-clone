<?php

namespace App\Tickets;

use Illuminate\Database\Eloquent\Builder;

class TheaterQueryBuilder extends Builder
{
    public function showingMovie(Movie $movie)
    {
        return $this->whereExists(function (\Illuminate\Database\Query\Builder $query) use ($movie) {
            $query->selectRaw(1)
                ->from('rooms')
                ->whereColumn('rooms.theater_id', 'theaters.id')
                ->join('movie_sessions', 'movie_sessions.room_id', 'rooms.id')
                ->where('movie_sessions.movie_id', $movie->id);
        });
    }
}
