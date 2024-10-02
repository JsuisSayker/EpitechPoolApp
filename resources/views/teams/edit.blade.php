<x-layout>
    <x-slot:heading>
        Edit Team: {{ $team->name }}
    </x-slot:heading>

    <form method="POST" action="/teams/ {{ $team->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12 dark:border-gray-300">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">
                    <x-form-field>
                        <x-form-label for="name">Name</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="name" id="name" type="text" value="{{ $team->name }}"
                                required />
                            <x-form-error name="name" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-between gap-x-6">
            <x-delete-button form_name="delete-form"></x-delete-button>
            <div class="flex items-center gap-x-6">
                <a href="/teams/{{ $team->id }}" class="text-sm font-semibold leading-6 ">Cancel</a>
                <x-form-button>Update</x-form-button>
            </div>
        </div>
    </form>
    @auth
        <form method="POST" action="/teams/{{ $team->id }}" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endauth
</x-layout>
