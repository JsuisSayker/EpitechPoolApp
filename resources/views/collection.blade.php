<x-layout>
    <x-slot:heading>
        Collection Page
    </x-slot:heading>
    <p class="text-2xl mb-2">commun</p>
    <div class="flex flex-wrap gap-2">
        @foreach (File::glob(public_path('images') . '/cards/commun/*') as $path)
            <img id="{{ $path }}" class="h-70 w-60 hover:opacity-90"
                src="{{ str_replace(public_path(), '', $path) }}">
            <x-modal modal_tag="{{ $path }}"></x-modal>
        @endforeach
    </div>

    <br>
    <p class="text-2xl mb-2">peu-commun</p>
    <div class="flex flex-wrap gap-2">
        @foreach (File::glob(public_path('images') . '/cards/peu-commun/*') as $path)
            <img id="{{ $path }}" class="h-70 w-60 hover:opacity-90"
                src="{{ str_replace(public_path(), '', $path) }}">
            <x-modal modal_tag="{{ $path }}"></x-modal>
        @endforeach
    </div>

    <br>
    <p class="text-2xl mb-2">rare</p>
    <div class="flex flex-wrap gap-2">
        @foreach (File::glob(public_path('images') . '/cards/rare/*') as $path)
            <img id="{{ $path }}" class="h-70 w-60 hover:opacity-90"
                src="{{ str_replace(public_path(), '', $path) }}">
            <x-modal modal_tag="{{ $path }}"></x-modal>
        @endforeach
    </div>

    <br>
    <p class="text-2xl mb-2">ultra-rare</p>
    <div class="flex flex-wrap gap-2">
        @foreach (File::glob(public_path('images') . '/cards/ultra-rare/*') as $path)
            <img id="{{ $path }}" class="h-70 w-60 hover:opacity-90"
                src="{{ str_replace(public_path(), '', $path) }}">
            <x-modal modal_tag="{{ $path }}"></x-modal>
        @endforeach
    </div>

</x-layout>
