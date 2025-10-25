
@php

//    $trailerUrl = 'https://www.youtube.com/embed/PLl99DlL6b4'
$trailerUrl ='';
if (Str::contains($movie->trailer_link, 'https://www.youtube.com/')) {

    $trailerUrl = str_replace('watch?v=', 'embed/', $movie->trailer_link);
}



@endphp


<x-main-layout>
    <div class="flex flex-row gap-72">
        <div>
            {{-- left --}}
            <div>
                {{$movie->title}}
            </div>
            <div>
                {{$movie->description}}
            </div>
            <div>
                <div class="text-gray-300">
                    Genre: <span>                
                        @foreach ($movie->genres as $genre)
                        <x-genre :genre="$genre"></x-genre> 
                         @endforeach
                </span>
            </div>

            <div>
                Artists:
                @foreach ($movie->artists as $artist)
                    <x-artist :artist="$artist"></x-artist>
                @endforeach
            </div>

            <div class="mt-5 mb-5">
                <video src="{{asset('storage/'.$movie->download_link) }}" controls></video>
            </div>
            <div>
                <a href="/movies/{{$movie->id}}/download"            class="px-6 py-3 bg-blue-700 text-white font-medium rounded-lg 
                    hover:bg-blue-800 transition-colors duration-300 shadow-md">download</a>
            </div>
        </div>
        <div> 
            {{-- right --}}
            <div>

                <img src="{{asset('storage/'.$movie->poster) }}" alt="" >
            </div>

            <div>

                <iframe src="{{$trailerUrl}}" frameborder="2" allowfullscreen></iframe>
            </div>
        </div>
    </div>


</x-main-layout>