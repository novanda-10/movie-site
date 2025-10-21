
@php

//    $trailerUrl = 'https://www.youtube.com/embed/PLl99DlL6b4'
$trailerUrl ='';
if (Str::contains($movie->trailer_link, 'https://www.youtube.com/')) {

    $trailerUrl = str_replace('watch?v=', 'embed/', $movie->trailer_link);
}



@endphp


<x-main-layout>
    
    <div>
        {{$movie->title}}
    </div>
    <div>
        {{$movie->description}}
    </div>
    <div>
        {{$movie->genre}}
    </div>

    <div>

        <iframe src="{{$trailerUrl}}" frameborder="2" allowfullscreen></iframe>
    </div>

    <div>

        <img src="{{asset('storage/'.$movie->poster) }}" alt="" >
    </div>

    <div>
        <video src="{{asset('storage/'.$movie->download_link) }}" controls></video>
    </div>
    <div>
        <a href="/movies/{{$movie->id}}/download">download</a>
    </div>

</x-main-layout>