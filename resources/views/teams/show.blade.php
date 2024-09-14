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
    <div class="p-3">Changelog</div>
    <table class="w-full table-auto text-white text-left rounded-xl overflow-hidden bg-white shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
        <thead >
            <th class="hidden sm:table-cell p-3 border-b">total balance</th>
            <th class="hidden sm:table-cell p-3 border-b">delta points</th>
            <th class="hidden sm:table-cell p-3 border-b">description</th>
            <th class="hidden sm:table-cell p-3 border-b">date</th>
            @auth
                <th class="hidden sm:table-cell p-3 border-b">Action</th>
            @endauth
        </thead>
        <tbody>
            @for ($i = 1; $i < count($point); $i += 1)
                <tr
                    class="even:bg-gray-100 dark:even:bg-gray-700">
                    @php
                        $totalBalance += $point[$i]->point;
                    @endphp
                    <td class="flex sm:table-cell p-3 break-words">{{ $totalBalance }}</td>
                    <td class="flex sm:table-cell p-3 break-words">{{ $point[$i]->point }}</td>
                    <td class="flex sm:table-cell p-3 break-words">{{ $point[$i]->description }}</td>
                    <td class="flex sm:table-cell p-3 break-words">{{ $point[$i]->created_at }}</td>
                    @auth
                        <td class="flex gap-3 p-3">
                            <x-button href="/points/{{ $point[$i]->id }}/edit">Edit</x-button>
                            <x-delete-button form_name="delete-points-form-{{ $point[$i]->id }}"></x-delete-button>
                            <form method="POST" action="/points/{{ $point[$i]->id }}"
                                id='delete-points-form-{{ $point[$i]->id }}' class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @endauth
                </tr>
            @endfor
        </tbody>
    </table>
    {{-- @for ($i = 1; $i < count($point); $i += 1)
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
                    <form method="POST" action="/points/{{ $point[$i]->id }}"
                        id='delete-points-form-{{ $point[$i]->id }}' class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                @endauth
            </div>
        </x-text-widget>
    @endfor --}}


</x-layout>
