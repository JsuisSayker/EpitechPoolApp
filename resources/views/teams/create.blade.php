<x-layout>
    <x-slot:heading>
        Create Team
    </x-slot:heading>

    <form method="POST" action="/teams">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12 dark:border-gray-300">
                <h2 class="text-base font-semibold leading-7">Create a New Team</h2>
                <p class="mt-1 text-sm leading-6 ">We just need a handful of details from you.</p>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">

                    <x-form-field>
                        <x-form-label for="name">Name</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="name" id="name" type="text" :value="old('name')" required />
                            <x-form-error name="name" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/teams/" class="text-sm font-semibold leading-6 ">
                Cancel
            </a>
            <x-form-button>Create</x-form-button>
        </div>
    </form>
</x-layout>
