<x-layout>
    <x-slot:heading>
        Collection Page
    </x-slot:heading>
    <p class="dark:text-gray-300">Collection Page</p>

    <br>
    <h2 class="dark:text-gray-300">commun</h2>
    <div class="flex flex-wrap">
        @foreach (File::glob(public_path('images') . '/cards/commun/*') as $path)
            <a href=""></a>
            <img class="h-70 w-60 ml-2 mt-2" src="{{ str_replace(public_path(), '', $path) }}">
        @endforeach
    </div>

    <br>
    <h2 class="dark:text-gray-300">peu-commun</h2>
    <div class="flex flex-wrap">
        @foreach (File::glob(public_path('images') . '/cards/peu-commun/*') as $path)
            <img class="h-70 w-60 ml-2 mt-2" src="{{ str_replace(public_path(), '', $path) }}">
        @endforeach
    </div>

    <br>
    <h4 class="dark:text-gray-300">rare</h4>
    <div class="flex flex-wrap space-x-2">
        @foreach (File::glob(public_path('images') . '/cards/rare/*') as $path)
            <img class="h-70 w-60 ml-2 mt-2" src="{{ str_replace(public_path(), '', $path) }}">
        @endforeach
    </div>

    <br>
    <h3 class="dark:text-gray-300">ultra-rare</h3>
    <div class="flex flex-wrap space-x-2">
        @foreach (File::glob(public_path('images') . '/cards/ultra-rare/*') as $path)
            <img class="h-70 w-60 ml-2 mt-2" src="{{ str_replace(public_path(), '', $path) }}">
        @endforeach
    </div>

</x-layout>
