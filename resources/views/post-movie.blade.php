<x-main-layout>

    <form action="/postmovie" method="post" enctype="multipart/form-data" class="text-blue-500 flex flex-col">
        @csrf

        <label for="title">title</label>
        <input type="text" name="title" id="title">

        <label for="description">description</label>
        <input type="text" name="description" id="description">

        <label for="genre">genre</label>
        <input type="text" name="genre" id="genre">

        <label for="poster">poster</label>
        <input type="file" name="poster" id="poster" >

        <label for="trailer_link">trailer link</label>
        <input type="url" name="trailer_link" id="trailer_link">

        <label for="download_link">download link</label>
        <input type="file" name="download_link" id="download_link">

        <button type="submit" >add movie</button>

    </form>


</x-main-layout>