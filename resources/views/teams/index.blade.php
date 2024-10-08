<x-layout>
    <x-slot:heading>
        Teams Page
    </x-slot:heading>
    <div class="flex mb-4">
        <div class="grow">
        </div>
        @auth
            <x-button href="/teams/create">Add Team</x-button>
        @endauth
    </div>
    @php
        $i=0;
    @endphp
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        @foreach ($teams as $team)
            @php
                $actualBalance = array_sum($team->points()->get()->pluck('point')->toArray());
                $i+=1;
            @endphp
            <x-team-widget href="/teams/{{ $team->id }}" background_image="/images/cards/rare/Quentin.png" imageNb={{$i}}>
                <h2>{{ $team->name }}</h2> <br>
                <p>points: {{ $actualBalance }}</p>
            </x-team-widget>
        @endforeach
    </div>
</x-layout>
