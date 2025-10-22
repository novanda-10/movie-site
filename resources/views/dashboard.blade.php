<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-4">
        <a href="/" 
           class="px-6 py-3 bg-blue-700 text-white font-medium rounded-lg 
                  hover:bg-blue-800 transition-colors duration-300 shadow-md">
            Home Page
        </a>
    </div>

</x-app-layout>
