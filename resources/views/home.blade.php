<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    @auth
        <form method="POST" action="/notifications/update{{ $notifications[0]->id }}">
            @csrf
            @method('PATCH')

            <p> {{ $notifications }} </p>
            @php
                $message = '';
            @endphp
            {{-- @foreach ($notifications as $notification)
            @endforeach --}}

            <textarea
                name="description"
                class="flex-1 resize-none flex min-h-[60px] w-[60%] mx-auto rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 placeholder:text-gray-500 dark:placeholder:text-gray-500 shadow-sm focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-gray-400 dark:focus-visible:ring-gray-600 disabled:cursor-not-allowed disabled:opacity-50"
                placeholder="Type your message here..."></textarea>

            <x-form-button>Submit</x-form-button>
        </form>
    @endauth


</x-layout>
