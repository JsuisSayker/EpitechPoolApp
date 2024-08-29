<x-layout>
    <x-slot:heading>
        Team
    </x-slot:heading>
    <h1 class="font-bold text-lg">{{ $team->name }}</h1>

    <div class="flex">
        <div>default Balance Point : {{ $points[0]->point }}</div>
        <div class="mx-4">Actual Balance Point : {{ $points[count($points) - 1]->point }}</div>
    </div>
    @for ($i = 1; $i < count($points); $i++)
        <div
            class="flex items-start my-3 gap-4 rounded-lg bg-white p-3 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"">
            <div>total balance: {{ $points[$i]->point }}</div>
            <div>delta points: {{ $points[$i]->point - $points[$i - 1]->point }}</div>
            <div>description {{ $points[$i]->description }}</div>
            <div>date: {{ $points[$i]->created_at }}</div>
            <div class="right">
                <x-button href="/points/{{ $points[$i]->id }}/edit">Edit</x-button>
            </div>
        </div>
    @endfor

    {{-- @foreach ($points as $point)
        <div>
            {{ $point }}
        </div>
    @endforeach --}}

    <p class="mt-6">
        <x-button href="/teams/{{ $team->id }}/edit">Edit</x-button>
    </p>
</x-layout>
