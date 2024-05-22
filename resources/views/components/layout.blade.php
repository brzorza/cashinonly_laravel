<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAShINOnly</title>
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href='/app/resources/css/app.css'> --}}
</head>
<body class="bg-gray-900 text-white">

    <div class="relative top-0 w-full">
        <nav class="relative top-0 bg-gray-900 text-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="text-xl font-bold text-white"><span class="text-green-400"><span class="logo-capital">C</span>as</span>h<span class="text-green-400"><span class="logo-capital">I</span>n<span class="logo-capital">O</span></span>nly</a>
                        </div>
                        <div class="hidden md:flex md:ml-6 md:space-x-8">
                            @auth
                            <a href="/games" class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 text-sm font-medium">Games</a>
                            @endauth
                            <a href="#" class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 text-sm font-medium">About</a>
                            <a href="#" class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 text-sm font-medium">Scoreboard</a>
                        </div>
                    </div>
                    <div class="hidden md:flex md:items-center md:space-x-8">
                        @auth
                        <a href="#" class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 text-sm font-medium">{{auth()->user()->name}}</a>
                        <a href="#" class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 text-sm font-medium">Credits</a>
                        <form method="POST" action="/logout" class="px-1 pt-1">
                            @csrf
                            <input type="submit" value="Logout" class="text-white logout-form-input hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">
                        </form>
                        @else
                        <a href="/register" class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 text-sm font-medium">Register</a>
                        <a href="/login" class="text-white hover:text-green-500 inline-flex items-center px-1 pt-1 text-sm font-medium">Login</a>
                        @endauth
                    </div>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-green-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-700" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!-- Heroicon name: menu -->
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <!-- Heroicon name: x -->
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden hidden fixed w-full bg-gray-900" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    @auth
                    <a href="/games" class="text-white hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">Games</a>
                    @endauth
                    <a href="#" class="text-white hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">About</a>
                    <a href="#" class="text-white hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">Scoreboard</a>
                    @auth
                        <a href="#" class="text-white hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">{{auth()->user()->name}}</a>
                        <a href="#" class="text-white hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">Credits</a>
                        <form method="POST" action="/logout" class="pl-3">
                            @csrf
                            <input type="submit" value="Logout" class="text-white p-0 hover:text-green-500 block py-2 rounded-md text-base font-medium">
                        </form>
                    @else
                        <a href="/register" class="text-white hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">Register</a>
                        <a href="/login" class="text-white hover:text-green-500 block px-3 py-2 rounded-md text-base font-medium">Login</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>

    <main >
        {{$slot}}
    </main>

    <script>
        // Toggle mobile menu
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
            mobileMenuButton.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>