<x-main-layout>


    <div class="text-4xl font-bold flex justify-center">{{$genre->name}}</div>


    @foreach ($genre->movies as $movie)
     <x-movie-card :movie="$movie"></x-movie-card>
    @endforeach

</x-main-layout>