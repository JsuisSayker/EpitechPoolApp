@props(['background_image' => ''])
<a {{ $attributes }}
    class="bg-team flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
    <div>
        {{ $slot }}
    </div>
    <style>

        .bg-team {
            /* The image used */
            /* background-image: url("{{ $background_image }}"); */

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
        }
    </style>
</a>
