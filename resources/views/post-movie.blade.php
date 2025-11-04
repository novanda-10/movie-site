<x-main-layout>

    <form action="/postmovie" method="post" enctype="multipart/form-data" class="text-blue-500 flex flex-col">
        @csrf

        <a href="/postmovie/baseapiform" class="flex justify-center mb-10">autofill the fildes(use api)</a>

        <label for="title">title</label>
        <input type="text" name="title" id="title">

        <label for="description">description</label>
        <input type="text" name="description" id="description">

        {{-- <label for="genre">genre</label>
        <input type="text" name="genre" id="genre"> --}}

        <label for="poster">poster</label>
        <input type="file" name="poster" id="poster" >

        <label for="trailer_link">trailer link</label>
        <input type="url" name="trailer_link" id="trailer_link">

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
            @foreach ($artists as $artist)
                <input type="checkbox" name="artists[]" value="{{$artist->id}}">{{$artist->name}}
            @endforeach
        </div>



        <button type="submit" >add movie</button>




    </form>


</x-main-layout>