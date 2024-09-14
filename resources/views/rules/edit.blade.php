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
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="title" id="title" type="text"
                                value="{{ $rules->title }}" required />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2 text-left">
                            <x-form-input name="description" id="description" type="text"
                                value="{{ $rules->description }}" required />
                            <x-form-error name="description" />
                        </div>
                    </x-form-field>
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
