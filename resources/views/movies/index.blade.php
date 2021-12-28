<x-guest-layout>
    {{ __('Filmes - ') }} Recife

    <ul>
        @foreach ($movies as $movie)
            <li>
                <a href="{{ route('movies.show', $movie) }}">
                    <strong>{{ $movie->name }}</strong>
                </a>

            </li>
        @endforeach
    </ul>

    {{ $movies->links() }}

</x-guest-layout>
