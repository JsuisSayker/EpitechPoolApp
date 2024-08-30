<x-layout>
    <x-slot:heading>
        Team
    </x-slot:heading>
    <h1 class="font-bold text-lg dark:text-gray-300">{{ $team->name }}</h1>

    @php
        $totalBalance = $points->first()->point ?? 0;
        $actualBalance = array_sum($points->pluck('point')->toArray());
    @endphp
    <div class="flex space-x-2 dark:text-gray-300">
        <div class="grow flex space-x-2">
            <div>Default Balance Point : {{ $points->first()->point ?? 'N/A' }}</div>

            <div>Actual Balance Point : {{ $actualBalance }}</div>
        </div>
        @auth
            <x-button href="/points/create?teams_id={{ $team->id }}">Add Point</x-button>
            <x-button href="/teams/{{ $team->id }}/edit">Edit Team</x-button>
        @endauth
    </div>
    <div class="dark:text-gray-300">Changelog</div>
    @for ($i = 1; $i < count($points); $i += 1)
        @php
            $totalBalance += $points[$i]->point;
        @endphp
        <x-text-widget>
            <div class="flex grow m-2 space-x-2">
                <div>total balance: {{ $totalBalance }}</div>
                <div>delta points: {{ $points[$i]->point }}</div>
                <div>description {{ $points[$i]->description }}</div>
                <div>date: {{ $points[$i]->created_at }}</div>
            </div>
            <div class="flex space-x-3 mx-1">
                @auth
                    <x-button href="/points/{{ $points[$i]->id }}/edit">Edit</x-button>
                    <x-delete-button :form_name="'delete-points-form'"></x-delete-button>
                @endauth
            </div>
        </x-text-widget>
        <form method="POST" action="/points/{{ $points[$i]->id }}" id="delete-points-form" class="hidden">
            @csrf
            <!-- @method('DELETE') -->
        </form>
    @endfor


</x-layout>
