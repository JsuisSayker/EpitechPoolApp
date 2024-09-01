<x-layout>
    <x-slot:heading>
        Create New Rule
    </x-slot:heading>

    <form method="POST" action="/rules">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12 dark:border-gray-300">
                <h2 class="text-base font-semibold leading-7">Create a New Rule</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Enter the description of your new rule.</p>

                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="description" class="block text-sm font-medium leading-6">
                            Description</x-form-label>
                        {{-- <label for="name" class="block text-sm font-medium leading-6">Description</label> --}}
                        <div class="mt-2">
                            <x-form-input type="text" name="description" id="description"
                                class="block flex-1 border-0 bg-transparent py-1.5 px-3 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="Explain your pool code to gain 100 points" required />
                            @error('description')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/rules/" class="text-sm font-semibold leading-6">
                Cancel
            </a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>
