<x-layout>
    <x-slot:heading>
        Rules Page
    </x-slot:heading>
    @foreach ($rules as $rule)
        <x-text-widget>
            {{ $rule->description }}
        </x-text-widget>
    @endforeach
</x-layout>
