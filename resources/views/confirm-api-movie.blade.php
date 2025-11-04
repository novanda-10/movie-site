<x-main-layout>

    <form action="/postmovie/createmoviefromapi" method="post" enctype="multipart/form-data" class="text-blue-500 flex flex-col">
        @csrf

        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{$data['Title']}}">

        <label for="description">description</label>
        <input type="text" name="description" id="description" 
        value="{{$data['Plot']}}">


        <label for="poster">poster</label>
        {{-- <input type="file" name="poster" id="poster" > --}}

        <div>

            <img src="{{$data['Poster']}}" alt="" >

            <input type="hidden" name="poster" id="poster" 
            value="{{$data['Poster']}}"> 
            {{-- in conttroller first store the poster file --}}
        </div>



        <label for="trailer_link">trailer link</label>
        <input type="url" name="trailer_link" id="trailer_link">

        <label for="download_link">download link</label>
        <input type="file" name="download_link" id="download_link">


        <label for="">Genres</label>
        <div>
            @foreach ($genres as $genre)
                  <input type="hidden" name="genres[]" value="{{$genre}}"> 
                
                {{$genre}}
            @endforeach
        </div>

        <label for="">Artists</label>
        <div>
            @foreach ($artists as $artist)
               
            
            <input type="hidden" name="artists[]" value="{{$artist}}">
                
            
                {{$artist}}

            @endforeach
        </div>


        <button type="submit" >add movie</button>


    </form>


</x-main-layout>