<?php declare(strict_types=1);

namespace App\Tickets;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsController;

class GetMovieAction
{
    use AsController;

    public function asController(Request $request, Movie $movie)
    {
        $theaters = Theater::with('rooms.movieSessions')->showingMovie($movie)->cursorPaginate();
        return view('movies.show', compact('movie', 'theaters'));
    }
}
