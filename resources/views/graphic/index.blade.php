<x-layout>
    <x-slot:heading>
        Graphic Page
    </x-slot:heading>
    <div class="p-6 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>
</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
</x-layout>
