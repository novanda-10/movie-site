

<x-main-layout>
    <h1>
        show moviesss
    </h1>

    <div>
        @foreach ($movies as $movie)
            <x-movie-card :movie="$movie" ></x-movie-card>

            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="/movies/{{$movie->id}}/editmovie">edit</a>

                    <form action="/movies/{{$movie->id}}/deletemovie" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">delete</button>
                    </form>
                @endif
            @endauth

        @endforeach
    </div>
</x-main-layout>