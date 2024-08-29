<x-layout>
    <x-slot:heading>
        Rules Page
    </x-slot:heading>
    @foreach ($rules as $rule)
        <div>

            {{ $rule['description'] }}
        </div>
    @endforeach
</x-layout>
