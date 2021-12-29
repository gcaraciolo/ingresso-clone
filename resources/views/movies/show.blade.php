<x-public-layout>
    <div>
        Filme: {{ $movie->name }}
    </div>

    @include('movies.on_theaters', $theaters)
</x-public-layout>
