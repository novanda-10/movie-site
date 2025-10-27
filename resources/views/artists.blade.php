<x-main-layout>
    @foreach ($artists as $artist)
        {{-- {{$artist->name}} --}}
        <x-artist-card :artist="$artist"></x-artist-card>
    @endforeach

    {{$artists->links()}}
</x-main-layout>