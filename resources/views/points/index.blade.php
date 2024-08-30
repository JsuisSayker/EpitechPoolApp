<x-layout>
    <x-slot:heading>
        Points Page
    </x-slot:heading>
    <div class="p-6 bg-white rounded shadow dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
        {!! $chart->container() !!}
    </div>
</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
</x-layout>
