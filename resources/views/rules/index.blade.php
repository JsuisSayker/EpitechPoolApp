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
        <x-text-widget onclick="myFunction({{$rule->id}})">
            <x-arrow rule_id="{{ $rule->id }}"></x-arrow>
            <div class="flex grow my-auto gap-4 ml-1">
                {{ $rule->title }}
            </div>

            <div class="flex gap-3 mr-1">
                @auth
                    <x-button href="/rules/{{ $rule->id }}/edit">Edit</x-button>
                    <x-delete-button form_name="delete-rule-form-{{ $rule->id }}"></x-delete-button>
                    <form method="POST" action="/rules/{{ $rule->id }}" id='delete-rule-form-{{ $rule->id }}'
                        class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                @endauth
            </div>

        </x-text-widget>
        <div id="myDIV-{{ $rule->id }}"
            class="w-full p-0 text-center bg-gray-100 mt-5 overflow-hidden h-0 transition-[height,padding] duration-500 ease-out">
            {{ $rule->description }}
        </div>
    @endforeach
</x-layout>
