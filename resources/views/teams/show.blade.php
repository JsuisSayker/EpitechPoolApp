<x-layout>
    <x-slot:heading>
        Team
    </x-slot:heading>
    <h1 class="font-bold text-lg">{{ $team->name }}</h1>

    <p>default Point : {{ $points[0]->point }}</p>
    @for ($i = 1; $i < count($points); $i++)
        <p>date: {{ $points[$i]->created_at }}, delta points : {{ $points[$i]->point - $points[$i - 1]->point }}, total
            {{ $points[$i]->point }}</p>
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
