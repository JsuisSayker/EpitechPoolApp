<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
    <link rel="icon" href="favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <style>
        #myDIV {
            width: 100%;
            padding: 0;
            text-align: center;
            background-color: lightblue;
            margin-top: 20px;
            overflow: hidden;
            height: 0;
            /* Start closed */
            transition: height 0.5s ease-out, padding 0.5s ease-out;
            /* Smooth transition */
        }

        /* Expanded state */
        #myDIV.show {
            height: 100px;
            border-radius: 10px;
            /* Final height */
            padding: 50px 0;
            /* Restore padding */
        }

        /* Arrow Button */
        #toggleButton {
            color: red;
            font-size: 24px;
            cursor: pointer;
            background-color: transparent;
            border: none;
            outline: none;
            transition: transform 0.3s ease;
        }

        /* Rotated arrow */
        #toggleButton.rotate {
            transform: rotate(180deg);
        }
    </style> --}}
</head>

<body class="h-full bg">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex-shrink-0">
                        <a href="https://intra.epitech.eu/">
                            <img class="h-8 w-8" src="/images/logo/epitech.svg" alt="Main Logo">
                        </a>
                    </div>
                    <div class="col-auto space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/teams" :active="request()->is('/teams')">Teams</x-nav-link>
                        <x-nav-link href="/points" :active="request()->is('/points')">Points</x-nav-link>
                        <x-nav-link href="/collection" :active="request()->is('/collection')">Collection</x-nav-link>
                        <x-nav-link href="/rules" :active="request()->is('/rules')">Rules</x-nav-link>
                        {{-- <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link> --}}
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @guest
                                <x-nav-link href="/login" :active="request()->is('/login')">Log In</x-nav-link>
                            @endguest

                            @auth
                                <form method="POST" action="/logout">
                                    @csrf
                                    <x-form-button>Log Out</x-form-button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    {{-- TODO --}}
                    <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                        aria-current="page">Home</a>
                    <a href="/about"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
                    <a href="/contact"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow dark:bg-gray-700">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-300"> {{ $heading }}</h1>
            </div>
        </header>
        <main class="">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 m-4 bg-text rounded-lg">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

<style>
    .bg {
        /* The image used */
        background-image: url("/images/background.jpg");

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: repeat;
        background-size: cover;
    }

    /* Position text in the middle of the page/image */
    .bg-text {
        box-sizing: border-box;
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/opacity/see-through */
        font-weight: bold;
        position: relative;
        width: 100%;
        padding: 20px;
        text-align: center;
    }
</style>

</html>
