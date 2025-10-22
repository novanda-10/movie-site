

<x-main-layout>
    <h1>
        show moviesss
    </h1>

    <div>
        @foreach ($movies as $movie)
            <x-movie-card :movie="$movie" ></x-movie-card>


        @endforeach
    </div>
</x-main-layout>