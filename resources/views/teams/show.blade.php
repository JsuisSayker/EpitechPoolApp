<x-layout>
    <x-slot:heading>
        Team
    </x-slot:heading>
    <h1 class="font-bold text-lg">{{ $team->name }}</h1>

    @php
        $totalBalance = $points[0]->point;
        $actualBalance = array_sum($points->pluck('point')->toArray());
    @endphp
    <div class="flex space-x-2">
        <div class="grow flex space-x-2">
            <div>Default Balance Point : {{ $points[0]->point }}</div>

            <div>Actual Balance Point : {{ $actualBalance }}</div>
        </div>
        <x-button href="/points/create?{{$team->id}}">Add Point</x-button>
        <x-button href="/teams/{{ $team->id }}/edit">Edit Team</x-button>
    </div>
    <div>Changelog</div>
    @for ($i = 1; $i < count($points); $i += 1)
        @php
            $totalBalance += $points[$i]->point;
        @endphp
        <div
            class="flex my-3 rounded-lg bg-white p-3 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"">
            <div class="flex grow m-2 space-x-2">
                <div>total balance: {{ $totalBalance }}</div>
                <div>delta points: {{ $points[$i]->point }}</div>
                <div>description {{ $points[$i]->description }}</div>
                <div>date: {{ $points[$i]->created_at }}</div>
            </div>
            <div class="flex space-x-3 mx-1">
                @auth
                    <x-button href="/points/{{ $points[$i]->id }}/edit">Edit</x-button>
                    <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
                @endauth
                </div>
        </div>
        <form method="POST" action="/points/{{ $points[$i]->id }}" id="delete-points-form" class="hidden">
            @csrf
            <!-- @method('DELETE') -->
        </form>
    @endfor


</x-layout>
