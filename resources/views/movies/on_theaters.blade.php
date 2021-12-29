<ul>
    @foreach ($theaters as $theater)
        <li>
            <div>
                Cinema: {{ $theater->name }}

                <div>
                    @foreach ($theater->rooms as $room)
                        @foreach ($room->movieSessions as $movieSession)
                            <form method="POST" action="{{ route('bookings.store', $movieSession) }}">
                                @csrf
                                <button type="submit">Comprar ingresso</button>
                            </form>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </li>
    @endforeach
</ul>
