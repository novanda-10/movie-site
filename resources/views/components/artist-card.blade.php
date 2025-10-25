
<x-layout>

    <div class="p-4 bg-white/5 rounded-xl border border-transparent hover:border-blue-800 
                group transition-colors duration-300 flex items-center justify-between gap-6">



        <a href="/artists/{{ $artist->id }}" class="flex-1 space-y-2">
            <div class="text-lg font-semibold text-white">
                Artist Name: <span class="text-gray-300">{{$artist->name}}</span>
            </div>



            {{-- @auth
                @if (Auth::user()->role === 'admin')
                    <div class="flex items-center gap-3 pt-3">
                        <a href="/movies/{{ $movie->id }}/editmovie"
                           class="px-3 py-1 text-sm text-blue-100 bg-blue-700 rounded-lg 
                                  hover:bg-blue-800 transition">
                            Edit
                        </a>

                        <form action="/movies/{{ $movie->id }}/deletemovie" method="post"
                              onsubmit="return confirm('Are you sure you want to delete this movie?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 text-sm text-red-100 bg-red-700 rounded-lg 
                                           hover:bg-red-800 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endauth --}}

        </a>


        {{-- <div class="w-32 h-44 flex-shrink-0 overflow-hidden rounded-lg">
            <img src="{{ asset('storage/' . $movie->poster) }}" 
                 alt="{{ $movie->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div> --}}

    </div>

</x-layout>
