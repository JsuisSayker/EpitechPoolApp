<x-layout>
    <x-slot:heading>
        Edit rules
    </x-slot:heading>

    <form method="POST" action="/rules/{{ $rules->id }}">
        @csrf
        <!-- @method('PATCH') -->
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12 dark:border-gray-300">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">
                    <x-form-field>
                        <x-form-label for="description" class="block text-sm font-medium leading-6">New
                            Description</x-form-label>
                        <div class="sm:col-span-4">
                    </x-form-field>
                    <x-form-field>
                        <div class="mt-2">
                            <x-form-input type="text" name="description" id="description"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="description message needed if you change point balance"
                                value="{{ $rules->description }}" required />
                            @error('description')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>
        </div>


        <div class="mt-6 flex items-center justify-between gap-x-6">
            <x-delete-button form_name="delete-form"></x-delete-button>
            <div class="flex items-center gap-x-6">
                <a href="/rules" class="text-sm font-semibold leading-6">Cancel</a>
                <x-form-button>Update</x-form-button>
            </div>
        </div>
    </form>
    <form method="POST" action="/rules/{{ $rules->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
