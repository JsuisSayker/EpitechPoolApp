<x-layout>
    <x-slot:heading>
        Notifications Page
    </x-slot:heading>
    {{-- <div class="flex mb-4">
        <div class="grow">
        </div>
        @auth
            <x-button href="/teams/create">Add Team</x-button>
        @endauth
    </div>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8"> --}}
        {{-- @foreach ($notifications as $notification)
            <x-text-widget>
                <div class="flex grow my-auto gap-4 ml-1">
                    {{ $notification->description }}
                </div>
            </x-text-widget> --}}
            {{-- @php
                $actualBalance = array_sum($team->points()->get()->pluck('point')->toArray());
            @endphp --}}
            {{-- <x-team-widget href="/teams/{{ $team->id }}" background_image="/images/cards/rare/Quentin.png">
                <h2>{{ $team->name }}</h2> <br>
                <p>points: {{ $actualBalance }}</p>
            </x-team-widget> --}}
        {{-- @endforeach --}}
    {{-- </div> --}}
</x-layout>