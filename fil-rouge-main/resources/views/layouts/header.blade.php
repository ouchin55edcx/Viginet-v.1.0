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
    </style>
</head>

<body class="antialiased bg-gray-200">
<!-- component -->
<nav class="fixed top-0 w-full px-4 py-4 flex justify-between items-center bg-white shadow-md z-50">
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

<div class="container mx-auto h-screen bg-gray-200 ">
    <div class="flex flex-row justify-center relative">
        <!-- Middle -->
        <div class="md:w-[40vw] sm:w-600 h-screen bg-gray-200 text-black z-30 mt-16">

            <!-- links -->
            <div class=" pb-4 border-l border-r bg-white ">
                <div class="flex flex-shrink-0 p-4 pb-0 mt-4">
                    <div class="w-12 flex items-top">
                        <img class="inline-block h-10 w-10 rounded-full"
                             src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                             alt="" />
                    </div>
                    <div class="w-full">
                        <input type="text" id="searchInput" class="text-black placeholder-gray-500 border-2 border-black p-2 bg-[#EFEFEF] w-full rounded-full" placeholder="Search posts...">
                    </div>

                    <div id="searchResults"></div>
                </div>
                <script !src="">
                    const searchInput = document.getElementById('searchInput');
                    const searchResults = document.getElementById('searchResults');

                    searchInput.addEventListener('input', function() {
                        const searchQuery = this.value.trim();

                        if (searchQuery.length > 0) {
                            searchPosts(searchQuery);
                        } else {
                            searchResults.innerHTML = '';
                        }
                    });

                    function searchPosts(query) {
                        const xhr = new XMLHttpRequest();
                        xhr.open('GET', `/postSearch?query=${encodeURIComponent(query)}`, true);

                        xhr.onload = function() {
                            if (this.status === 200) {
                                const posts = JSON.parse(this.responseText);
                                displaySearchResults(posts);
                            }
                        };

                        xhr.send();
                    }

                    function displaySearchResults(posts) {
                        let html = '';

                        if (posts.length > 0) {
                            posts.forEach(post => {
                                html += `
                <!-- User Post -->
                <div class="border max-w-screen-md bg-white mt-6 p-4">
                    <div class="flex items-center justify-between">
                        <div class="gap-3.5 flex items-center">
                            <img src="storage/images/v56_47.png" class="object-cover bg-yellow-500 rounded-full w-10 h-10"/>
                            <div class="flex flex-col">
                                <time datetime="${post.created_at}" class="text-gray-400 text-xs">${formatDate(post.created_at)}</time>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-full h-3.5 flex items-center justify-center">
                            <!-- Icon for actions -->
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="34px" fill="#92929D">
                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                <path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="whitespace-pre-wrap mt-7 font-bold"># Info</div>
                    <div class="whitespace-pre-wrap mt-7 font-medium">${post.title}</div>
                    <div class="mt-4">
                        <p>${post.content}</p>
                    </div>
                </div>
            `;
                            });
                        } else {
                            html = '<p>No posts found.</p>';
                        }

                        searchResults.innerHTML = html;
                    }

                    function formatDate(dateString) {
                        const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
                        const date = new Date(dateString);
                        return date.toLocaleDateString('en-US', options);
                    }

                </script>
                <div class="flex justify-around  items-center mt-4">

                    <!-- First Trigger Link -->
                    <a href="#" class="flex gap-2" onclick="togglePopup('popup1')">
                        <img src="storage/images/write-svgrepo-com.svg" alt="" class="w-6 h-6">
                        <h1>Post</h1>
                    </a>

                    <!-- Second Trigger Link -->
                    <a href="#" class="flex gap-2" onclick="togglePopup('popup2')">
                        <img src="storage/images/question-and-asnwer-ask-question-qa-question-and-asnwer-session-svgrepo-com.svg" alt="" class="w-6 h-6">
                        <h1>Ask</h1>
                    </a>


                    <!-- First Popup Container -->
                    <div id="popup1" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                        <div class="bg-white p-4 rounded-lg w-[50vw]">
                            <div class="heading text-center font-bold text-xl mb-4 text-gray-800">New Post</div>
                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                @if(auth()->check())
                                <input type="hidden" value="{{ Auth()->user()->id }}">
                                @endif
                                <input class="title bg-gray-100 border border-gray-300 p-2 mb-2 outline-none w-full" spellcheck="false" placeholder="Title" type="text" name="title">
                                <textarea class="description bg-gray-100 sec p-2 h-40 border border-gray-300 outline-none w-full mb-4" spellcheck="false" placeholder="Describe everything about this post here" name="content"></textarea>
                                <input type="hidden" value="">

                                <!-- Icons -->
                                <input type="file" name="image[]" multiple>

                                <   !-- Buttons -->
                                <div class="buttons flex">
                                    <button type="button" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto" onclick="togglePopup('popup1')">Cancel</button>
                                    <button type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Second Popup Container -->
                    <div id="popup2" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                        <div class="bg-white p-4 rounded-lg w-[50vw]">
                            <div class="heading text-center font-bold text-xl mb-4 text-gray-800">Ask Question</div>
                            <form action="{{ route('asks.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                @if(auth()->check())
                                    <input type="hidden" value="{{ Auth()->user()->id }}">
                                @endif
                                <input class="title bg-gray-100 border border-gray-300 p-2 mb-2 outline-none w-full" spellcheck="false" placeholder="Start your question with 'What', 'How', 'Why', etc ..." type="text" name="content">
                                <!-- Buttons -->
                                <div class="buttons flex">
                                    <button type="button" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto" onclick="togglePopup('popup2')">Cancel</button>
                                    <button type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
                <div class="flex justify-around bg-white mt-4 shadow-md">
                    <a href="{{ route('community.index') }}" class="text-gray-800 hover:text-blue-500 py-2 px-4 inline-block">Posts</a>
                    <a href="{{ route('asks.index') }}" class="text-gray-800 hover:text-blue-500 py-2 px-4 inline-block">Questions</a>
                </div>

            <!-- /links -->

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
<script>
    // Function to toggle the visibility of a popup
    function togglePopup(popupId) {
        var popup = document.getElementById(popupId);
        if (popup) {
            popup.classList.toggle('hidden'); // Toggle the 'hidden' class
        }
    }
</script>

@yield('community')
