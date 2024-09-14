<x-layout>
    <x-slot:heading>
        Create Point
    </x-slot:heading>

    <form method="POST" action="/points">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12 dark:border-gray-300">
                <h2 class="text-base font-semibold leading-7 ">Create a New Point Balance
                    modification</h2>
                <p class="mt-1 text-sm leading-6 dark:text-gray-300">We just need a handful of details from
                    you.</p>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">

                    <input type="text" name="teams_id" id="teams_id" class="hidden" value='{{ $teams_id }}'
                        required>

                    <x-form-field>
                        <x-form-label for="point">Point</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="point" id="point" type="text" :value="old('point')" required />
                            <x-form-error name="point" />
                        </div>
                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="description" id="description" type="text" :value="old('description')"
                                placeholder="A mangé en salle machine" required />
                            <x-form-error name="description" />
                        </div>
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/teams/{{ $teams_id }}" class="text-sm font-semibold leading-6 ">
                Cancel
            </a>
            <x-form-button>Create</x-form-button>
        </div>
    </form>
</x-layout>
