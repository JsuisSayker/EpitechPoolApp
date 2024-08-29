<x-layout>
    <x-slot:heading>
        Rules Page
    </x-slot:heading>
    @foreach ($rules as $rule)
        <div class="block px-2 py-2 my-1 border border-gray-200 rounded-lg">
            {{ $rule['description'] }}
        </div>
    @endforeach
</x-layout>
