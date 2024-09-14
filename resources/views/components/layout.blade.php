<!DOCTYPE html class="h-full">
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
    <link rel="icon" href="favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg">
    <div class="hidden">
        Tom MENDY github.com/Tom-Mendy
    </div>
    <div class="hidden">
        Killian TROUVÉ github.com/JsuisSayker
    </div>
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="hidden md:block">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class=" flex h-16 items-center justify-between">
                        <div class="flex-shrink-0">
                            <a href="https://intra.epitech.eu/">
                                <img class="h-8 w-8" src="/images/logo/epitech.svg" alt="Main Logo">
                            </a>
                        </div>
                        <div class="col-auto space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            <x-nav-link href="/teams" :active="request()->is('teams')">Teams</x-nav-link>
                            <x-nav-link href="/points" :active="request()->is('points')">Points</x-nav-link>
                            <x-nav-link href="/collection" :active="request()->is('collection')">Collection</x-nav-link>
                            <x-nav-link href="/rules" :active="request()->is('rules')">Rules</x-nav-link>
                        </div>
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
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

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <script>
                    function MobileNavBarFunction() {
                        var x = document.getElementById("Mobile-NavBar");
                        var tkt = document.getElementById("Button-Mobile-NavBar");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            tkt.lastChild.data = "Close";
                        } else {
                            x.style.display = "none";
                            tkt.lastChild.data = "NavBar";
                        }
                    }
                </script>
                <div class="flex p-3">
                    <div class="flex-shrink-0">
                        <a href="https://intra.epitech.eu/">
                            <img class="h-8 w-8" src="/images/logo/epitech.svg" alt="Main Logo">
                        </a>
                    </div>
                    <div class="grow"></div>
                    <button id="Button-Mobile-NavBar" class="text-white" onclick="MobileNavBarFunction()">NavBar</button>
                </div>
                <div id="Mobile-NavBar" style="display: none">
                    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-mobile-nav-link href="/" :active="request()->is('/')">Home</x-mobile-nav-link>
                        <x-mobile-nav-link href="/teams" :active="request()->is('teams')">Teams</x-mobile-nav-link>
                        <x-mobile-nav-link href="/points" :active="request()->is('points')">Points</x-mobile-nav-link>
                        <x-mobile-nav-link href="/collection" :active="request()->is('collection')">Collection</x-mobile-nav-link>
                        <x-mobile-nav-link href="/rules" :active="request()->is('rules')">Rules</x-mobile-nav-link>
                    </div>
                    <div class="border-t border-gray-700 pb-3 pt-4">
                        @guest
                            <x-mobile-nav-link href="/login" :active="request()->is('login')">Login</x-mobile-nav-link>
                        @endguest

                        @auth
                            <form method="POST" action="/logout">
                                @csrf
                                <x-form-button class="justify-between">Log Out</x-form-button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow dark:bg-gray-700">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-300"> {{ $heading }}</h1>
            </div>
        </header>
        <main class="text-gray-900 placeholder:text-gray-500 dark:text-gray-100 dark:placeholder:text-gray-500">
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 m-4 rounded-lg bg-text">
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

    :where(.bg-text) {
        --background-color: rgba(255, 255, 255, 0.6);
    }

    @media (prefers-color-scheme: dark) {
        :where(.bg-text) {
            --background-color: rgba(0, 0, 0, 0.6);
        }
    }

    /* Position text in the middle of the page/image */
    .bg-text {
        box-sizing: border-box;

        /* Fallback color */
        background-color: var(--background-color);
        /* Black w/opacity/see-through */
        font-weight: bold;
        position: relative;
        width: 100%;
        padding: 20px;
        text-align: center;
    }
</style>



</html>
