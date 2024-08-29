<x-layout>
    <x-slot:heading>
        Team
    </x-slot:heading>
    <h1 class="font-bold text-lg">{{ $team->name }}</h1>
    <h2>{{ $team->point }}</h2>
    <p class="mt-6">
        <x-button href="/teams/{{ $team->id }}/edit">Edit</x-button>
    </p>
</x-layout>
