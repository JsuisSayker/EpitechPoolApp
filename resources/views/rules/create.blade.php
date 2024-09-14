<x-layout>
    <x-slot:heading>
        Create New Rule
    </x-slot:heading>

    <form method="POST" action="/rules">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12 dark:border-gray-300">
                <h2 class="text-base font-semibold leading-7">Create a New Rule</h2>
                <p class="mt-1 text-sm leading-6 ">Enter the description of your new rule.</p>
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 ">

                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="title" id="title" type="text" :value="old('title')"
                                placeholder="règle spécial" required />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="description" id="description" type="text" :value="old('description')"
                                placeholder="description détailé" required />
                            <x-form-error name="description" />
                        </div>
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/rules/" class="text-sm font-semibold leading-6 ">
                    Cancel
                </a>
                <x-form-button>Create</x-form-button>
            </div>
        </div>
    </form>
</x-layout>
