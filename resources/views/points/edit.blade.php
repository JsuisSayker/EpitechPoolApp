<x-layout>
    <x-slot:heading>
        Edit Point: {{ $point->point }}
    </x-slot:heading>

    <form method="POST" action="/points/ {{ $point->id }}">
        @csrf
        <!-- @method('PATCH') -->
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">Points</div>
                    <div
                        class="sm:col-span-4 py-4 px-4 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <div class="sm:col-span-4">
                            <label for="point"
                                class="block text-sm font-medium leading-6">Balance</label>
                            <div class="mt-2">
                                <x-form-text-box>
                                    <input type="text" name="point" id="point"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-3 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="500 (point)" value="{{ $point->point }}" required>
                                </x-form-text-box>
                                @error('point')
                                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="sm:col-span-4">
                            <label for="description"
                                class="block text-sm font-medium leading-6">Description</label>
                            <div class="mt-2">
                                <x-form-text-box>
                                    <input type="text" name="description" id="description"
                                        class="block flex-1 border-0 bg-transparent py-1.5 px-3 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="description message needed if you change point balance"
                                        value="{{ $point->description }}" required>
                                </x-form-text-box>
                                @error('description')
                                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <x-delete-button></x-delete-button>

            <div class="flex items-center gap-x-6">
                <a href="/teams/{{ $point->teams_id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <div>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>
        </div>
    </form>
    <form method="POST" action="/points/{{ $point->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
