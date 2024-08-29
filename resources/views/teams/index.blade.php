<x-layout>
    <x-slot:heading>
        Teams Page
    </x-slot:heading>
    <div class="flex mb-4">
        <div class="grow">
        </div>
        <x-button href="/teams/create">Add Team</x-button>
    </div>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        @foreach ($teams as $team)
            @php
                $actualBalance = array_sum($team->points()->get()->pluck('point')->toArray());
            @endphp
            <x-team-widget href="/teams/{{ $team->id }}">
                <strong>{{ $team->name }}</strong> <br>
                <p>points: {{ $actualBalance }}</p>
            </x-team-widget>
        @endforeach
    </div>
</x-layout>
