<x-layout>
    <x-slot:heading>
        Edit: Point n°{{ $point->id }}
    </x-slot:heading>

    <form method="POST" action="/points/ {{ $point->id }}">
        @csrf
        <!-- @method('PATCH') -->
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12 dark:border-gray-300">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">

                    <x-form-field>
                        <x-form-label for="point">Balance</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="point" id="point" type="text" value="{{ $point->point }}"
                                required />
                            <x-form-error name="point" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="description" id="description" type="text"
                                value="{{ $point->description }}" required />
                            <x-form-error name="description" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <x-delete-button></x-delete-button>

            <div class="flex items-center gap-x-6">
                <a href="/teams/{{ $point->teams_id }}"
                    class="text-sm font-semibold leading-6 ">Cancel</a>
                <x-form-button>Update</x-form-button>
            </div>
        </div>
    </form>
    <form method="POST" action="/points/{{ $point->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
