<x-main-layout>


    <form action="/movies/{{$movie->id}}/editmovie" method="post" enctype="multipart/form-data" class="text-blue-500 flex flex-col">
        @csrf


        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{$movie->title}}">

        <label for="description">description</label>
        <input type="text" name="description" id="description" 
        value="{{$movie->description}}">



        <label for="poster">poster</label>
        <input type="file" name="poster" id="poster">


        <label for="trailer_link" >trailer link</label>
        <input type="url" name="trailer_link" id="trailer_link"
        value="{{$movie->trailer_link}}">

        <label for="download_link">download link</label>
        <input type="file" name="download_link" id="download_link">

        <label for="">Select genres</label>
        <div>
            @foreach ($genres as $genre)
                <input type="checkbox" name="genres[]" value="{{$genre->id}}">{{$genre->name}}
            @endforeach
        </div>

        <label for="">Select artists</label>
        <div>
            @foreach ($artists as $atrist)
                <input type="checkbox" name="artists[]" value="{{$atrist->id}}">{{$atrist->name}}
            @endforeach
        </div>


        <button type="submit" >edit movie</button>

    </form>
</x-main-layout>