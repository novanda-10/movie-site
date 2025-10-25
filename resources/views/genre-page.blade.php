<x-main-layout>



    @foreach ($movies as $movie)
     <x-movie-card :movie="$movie"></x-movie-card>
    @endforeach

</x-main-layout>