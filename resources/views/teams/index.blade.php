<x-layout>
    <x-slot:heading>
        Teams Page
    </x-slot:heading>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        @foreach ($teams as $team)
            <x-team-widget href="/teams/{{ $team['id'] }}">
                <strong>{{ $team['name'] }}:</strong> salary {{ $team['point'] }}
            </x-team-widget>
        @endforeach
    </div>
</x-layout>
