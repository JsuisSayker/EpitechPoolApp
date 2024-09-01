<a
    {{ $attributes->merge([
        'class' =>
            'relative inline-flex items-center px-4 py-2 text-sm font-medium bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-700 dark:active:bg-gray-700',
    ]) }}>
    {{ $slot }}
</a>
