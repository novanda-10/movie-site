

<x-main-layout>


    <div class="text-4xl font-bold flex justify-center">
        {{$artist->name}} Movies</div>


    <div>
        @foreach ($artist->movies as $movie)

        <x-movie-card :movie="$movie" ></x-movie-card>

        @endforeach


    </div>
</x-main-layout>