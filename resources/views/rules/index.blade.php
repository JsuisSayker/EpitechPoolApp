<x-layout>
    <x-slot:heading>
        Rules Page
    </x-slot:heading>
    <div class="flex mb-4">
        <div class="grow">
        </div>
        @auth
            <x-button href="/rules/create">Add rule</x-button>
        @endauth
    </div>
    @foreach ($rules as $rule)
        <x-text-widget>
            <div class="flex grow m-2 space-x-2">
                {{ $rule->description }}
            </div>
            <div class="flex space-x-3 mx-1">
                @auth
                    <x-button href="/rules/{{ $rule->id }}/edit">Edit</x-button>
                    <x-delete-button :form_name="'delete-points-form'"></x-delete-button>
                @endauth
            </div>
        </x-text-widget>
    @endforeach
</x-layout>
