<x-layout>
    <x-slot:heading>
        Team: {{ $team->name }}
    </x-slot:heading>

    @php
        $totalBalance = $point->first()->point ?? 0;
        $actualBalance = array_sum($point->pluck('point')->toArray());
    @endphp
    <div class="flex space-x-2">
        <div class="grow flex space-x-4">
            <div>Default Balance Point : {{ $point->first()->point ?? 'N/A' }}</div>

            <div>Actual Balance Point : {{ $actualBalance }}</div>
        </div>
        @auth
            <x-button href="/points/create?teams_id={{ $team->id }}">Add Point</x-button>
            <x-button href="/teams/{{ $team->id }}/edit">Edit Team</x-button>
        @endauth
    </div>
    <div>Changelog</div>
    @for ($i = 1; $i < count($point); $i += 1)
        @php
            $totalBalance += $point[$i]->point;
        @endphp
        <x-text-widget>
            <div class="flex grow my-auto gap-4 ml-1">
                <div>total balance: {{ $totalBalance }}</div>
                <div>delta points: {{ $point[$i]->point }}</div>
                <div>description {{ $point[$i]->description }}</div>
                <div>date: {{ $point[$i]->created_at }}</div>
            </div>
            <div class="flex gap-3 mr-1">
                @auth
                    <x-button href="/points/{{ $point[$i]->id }}/edit">Edit</x-button>
                    <x-delete-button form_name="delete-points-form-{{ $point[$i]->id }}"></x-delete-button>
                    <form method="POST" action="/points/{{ $point[$i]->id }}" id='delete-points-form-{{ $point[$i]->id }}' class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                @endauth
            </div>
        </x-text-widget>
    @endfor


</x-layout>
