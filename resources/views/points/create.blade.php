<x-layout>
    <x-slot:heading>
        Create Point
    </x-slot:heading>

    <form method="POST" action="/points">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 ">Create a New Point Balance
                    modification</h2>
                <p class="mt-1 text-sm leading-6 dark:text-gray-300">We just need a handful of details from you.</p>

                <input type="text" name="teams_id" id="teams_id" class="hidden" value='{{ $teams_id }}' required>

                <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="point"
                            class="block text-sm font-medium leading-6 ">Point</label>
                        <div class="mt-2">
                            <x-form-text-box>
                                <input type="text" name="point" id="point"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="(-)500" required>
                            </x-form-text-box>
                            @error('point')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="description"
                            class="block text-sm font-medium leading-6 ">Description</label>
                        <div class="mt-2">
                            <x-form-text-box>
                                <input type="text" name="description" id="description"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="A mangé en salle machine" required>
                            </x-form-text-box>
                            @error('description')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/teams/{{ $teams_id }}" class="text-sm font-semibold leading-6">
                Cancel
            </a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>
