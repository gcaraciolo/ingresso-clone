<?php declare(strict_types=1);

namespace App\Tickets;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsController;

class GetMoviesAction
{
    use AsController;

    public function handle()
    {
        return Movie::cursorPaginate(5)->withQueryString();
    }

    public function asController(Request $request)
    {
        $movies = $this->handle();

        return view('movies.index', compact('movies'));
    }
}
