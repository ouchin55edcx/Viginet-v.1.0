<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="icon" href="/storage/images/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- component -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Roboto+Slab|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://premium-tailwindcomponents.netlify.app/assets/build/js/main.js?id=8c11b7cf78ebea1b5aed"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

    <title>VigiNet</title>


    <style>
        #menu-toggle:checked+#menu {
            display: block;
        }

        .correct-answer {
            @apply bg-green-500 text-white;
        }

        .incorrect-answer {
            @apply bg-red-500 text-white;
        }

    </style>
</head>

<body class="antialiased bg-gray-200">
    <!-- component -->
    <nav class="relative top-0 w-full px-4 py-4 flex justify-between items-center bg-white shadow-md z-50">
        <a class="text-3xl font-bold leading-none" href="/">
            <img src="/storage/images/logo.png" alt="" class="w-10">
        </a>
        <div class="lg:hidden absolute right-0">
            <button class="navbar-burger flex items-center text-blue-600 p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{ route('category.index') }}">Corses</a></li>
            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </li>
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{route('community.index')}}">Community</a></li>
            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </li>
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{route('complaint.index')}}">Complaint</a></li>
            <li class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </li>
            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{route('search.index')}}">Search</a></li>
        </ul>

          <div class="flex">
            @guest

            <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200" href="{{ route('login.index') }}">Login</a>
            <a class="hidden lg:inline-block py-2 px-6 bg-yellow-500 hover:bg-yellow-600 text-sm text-white font-bold rounded-xl transition duration-200" href="{{ route('register.index') }}">Sign up</a>
            @endguest
            @auth
            <a href="{{route('client.index')}}" class="hidden lg:inline-block ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
                <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400" src="https://imgs.search.brave.com/L5BVKmFq-Fc-6Ay0CSQM4ua29I67UrsE34rpF5zFwd0/rs:fit:500:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAwLzY0LzY3LzI3/LzM2MF9GXzY0Njcy/NzM2X1U1a3BkR3M5/a2VVbGw4Q1JRM3Az/WWFFdjJNNnFrVlk1/LmpwZw" alt="Profile Image">
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method('POST')
                <button type="submit" class="hidden lg:inline-block py-2 px-6 lg:ml-3 border-2 border-yellow-500 hover:bg-yellow-600 hover:text-white text-sm text-black font-bold rounded-xl transition duration-200 cursor-pointer">
                    Logout
                </button>
            </form>
            @endauth
          </div>
    </nav>

    <div class="navbar-menu relative z-40 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex justify-between  items-center mb-8">
                @auth
                <a href="{{route('client.index')}}" class=" lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
                    <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400" src="https://imgs.search.brave.com/L5BVKmFq-Fc-6Ay0CSQM4ua29I67UrsE34rpF5zFwd0/rs:fit:500:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAwLzY0LzY3LzI3/LzM2MF9GXzY0Njcy/NzM2X1U1a3BkR3M5/a2VVbGw4Q1JRM3Az/WWFFdjJNNnFrVlk1/LmpwZw" alt="Profile Image">
                </a>
                @endauth
                @guest
                <a class="mr-auto text-3xl font-bold leading-none" href="/">
                    <img src="storage/images/logo.png" alt="" class="w-10">
                </a>
                @endguest
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="{{ route('category.index') }}">Courses</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="{{route('complaint.index')}}">Community</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="{{route('community.index')}}">Complaint</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                            href="{{route('search.index')}}">Search</a>
                    </li>

                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6">
                    @guest
                    <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
                        href="#">Login</a>
                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-yellow-500 hover:bg-yellow-600  rounded-xl"
                        href="#">Sign Up</a>
                    @endguest
                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-black font-semibold border-2 border-yellow-500 hover:bg-yellow-600  rounded-xl"
                        href="#">Search</a>

                    @auth
                        <form  method="POST" action="#">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block lg:hideen py-2 px-6 lg:ml-3 border-2 border-yellow-500 hover:bg-yellow-600 hover:text-white text-sm text-black font-bold rounded-xl transition duration-200 cursor-pointer">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2024</span>
                </p>
            </div>

        </nav>
    </div>

    <script>
        // Burger menus
        document.addEventListener('DOMContentLoaded', function() {
            // open
            const burger = document.querySelectorAll('.navbar-burger');
            const menu = document.querySelectorAll('.navbar-menu');

            if (burger.length && menu.length) {
                for (var i = 0; i < burger.length; i++) {
                    burger[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            // close
            const close = document.querySelectorAll('.navbar-close');
            const backdrop = document.querySelectorAll('.navbar-backdrop');

            if (close.length) {
                for (var i = 0; i < close.length; i++) {
                    close[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            if (backdrop.length) {
                for (var i = 0; i < backdrop.length; i++) {
                    backdrop[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }
        });
    </script>

   @yield('content')
