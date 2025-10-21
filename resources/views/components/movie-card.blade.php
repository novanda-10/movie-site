@props(['movie'])


<x-layout>

    <div class="p-4 bg-white/5 rounded-xl  border border-transparent hover:border-blue-800 group transition-colors duration-300" >

        <a href="/movies/{{$movie->id}}">
                <div>
                title: {{$movie->title}}
                </div>
                <div>
                description: {{$movie->description}}
                </div>  
                <div>
                genre:{{$movie->genre}}
                </div>
                <div>
                    <img src="{{asset('storage/'.$movie->poster) }}" alt="" >
                </div>
        </a>

    </div>
</x-layout>

