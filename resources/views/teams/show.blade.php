<x-layout>
    <x-slot:heading>
        Team
    </x-slot:heading>
    <h1 class="font-bold text-lg dark:text-gray-300">{{ $team->name }}</h1>

    @php
        $totalBalance = $points[0]->point;
        $actualBalance = array_sum($points->pluck('point')->toArray());
    @endphp
    <div class="flex space-x-2 dark:text-gray-300">
        <div class="grow flex space-x-2">
            <div>Default Balance Point : {{ $points[0]->point }}</div>

            <div>Actual Balance Point : {{ $actualBalance }}</div>
        </div>
        <x-button href="/points/create?teams_id={{ $team->id }}">Add Point</x-button>
        <x-button href="/teams/{{ $team->id }}/edit">Edit Team</x-button>
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
                <x-button href="/points/{{ $points[$i]->id }}/edit">Edit</x-button>
                <x-delete-button :form_name="'delete-points-form'"></x-delete-button>
            </div>
        </x-text-widget>
        <form method="POST" action="/points/{{ $points[$i]->id }}" id="delete-points-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endfor


</x-layout>
