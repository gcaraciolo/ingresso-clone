<?php declare(strict_types=1);

namespace App\Tickets;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsController;

class GetMovieAction
{
    use AsController;

    public function asController(Request $request, Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }
}