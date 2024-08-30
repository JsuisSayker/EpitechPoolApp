<x-layout>
    <x-slot:heading>
        Rule
    </x-slot:heading>
    <p>{{ $rule->description }}</p>
    {{-- <p class="mt-6">
        <x-button href="/rules/{{ $rule->id }}/edit">Edit</x-button>
    </p> --}}
    <div class="flex space-x-3 mx-1">
        @auth
            <x-button href="/rules/{{ $rules[$i]->id }}/edit">Edit</x-button>
            <x-delete-button :form_name="'delete-points-form'"></x-delete-button>
        @endauth
    </div>
</x-layout>
