

<x-main-layout>
    <h1>
         movies
    </h1>

    <div>
        @foreach ($movies as $movie)
            <x-movie-card :movie="$movie" ></x-movie-card>


        @endforeach
        
        {{-- Pagination links --}}
        {{$movies->links()}}
    </div>
</x-main-layout>