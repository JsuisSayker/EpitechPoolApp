<x-layout>
    <x-slot:heading>
        Edit Team: {{ $team->name }}
    </x-slot:heading>

    <form method="POST" action="/teams/ {{ $team->id }}">
        @csrf
        <!-- @method('PATCH') -->
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6">Name</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" id="name"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{ $team->name }}" required>
                            </div>
                            @error('name')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-between gap-x-6">
            <x-delete-button form_name="delete-form"></x-delete-button>
            <div class="flex items-center gap-x-6">
                <a href="/teams/{{ $team->id }}" class="text-sm font-semibold leading-6">Cancel</a>
                <div>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
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
