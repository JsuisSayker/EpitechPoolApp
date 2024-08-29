<x-layout>
    <x-slot:heading>
        Rule
    </x-slot:heading>
    <p>{{ $rule->description }}</p>
    <p class="mt-6">
        <x-button href="/rules/{{ $rule->id }}/edit">Edit</x-button>
    </p>
</x-layout>
