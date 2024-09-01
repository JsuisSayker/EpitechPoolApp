<label {{ $attributes->merge([
    'class' => 'block text-sm font-medium leading-6',
]) }}>
    {{ $slot }}
</label>
