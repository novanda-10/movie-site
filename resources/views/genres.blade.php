<x-main-layout>
    @foreach ($genres as $genre)

    <a href="/genres/{{ $genre->id }}" >{{ $genre->name }}</a>

    @endforeach
</x-main-layout>