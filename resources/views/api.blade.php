<x-main-layout>
    apiiii

    <form action="/api" method="post" class="text-blue-500">
    @csrf
        <label for="title">title</label>
        <input type="text" name="title" id="title">

        <label for="year">year</label>
        <input type="text" name="year" id="year">

        <button type="submit">submit</button>
    </form>

    
</x-main-layout>