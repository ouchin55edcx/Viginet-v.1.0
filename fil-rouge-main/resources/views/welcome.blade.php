@extends('layouts.navbar')

@section('content')

    {{-- HERO SECTION  --}}
    <section class=" text-white relative">
        <!-- Background image -->
        <div class="absolute inset-0 bg-cover bg-center z-[-1] bg-[#223654]" ></div>

        <div class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between relative">
            <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                <h1 class="text-5xl font-bold leading-none sm:text-6xl">Ac mattis
                    <span class="dark:text-violet-400">senectus</span>erat pharetra
                </h1>
                <p class="mt-6 mb-8 text-lg sm:mb-12">Dictum aliquam porta in condimentum ac integer
                    <br class="hidden md:inline lg:hidden">turpis pulvinar, est scelerisque ligula sem
                </p>
                <div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                    <a rel="noopener noreferrer" href="{{route('register.index')}}" class="px-8 py-3 text-lg font-semibold bg-yellow-500 rounded border-yellow-500">Join for FREE</a>
                </div>
            </div>
            <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                <img src="storage/images/logo.png" alt="" class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
            </div>
        </div>
    </section>


    {{-- ABOUT LEARN  --}}
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="max-w-lg">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl p-4 border-b-4 border-yellow-500">
                        Learn
                        and Practice</h2>
                    <p class="mt-4 text-gray-600 text-lg p-4 mx-auto">Learn by following structured paths and reinforce your
                        skills
                        in a real-world environment by completing guided, objective-based tasks and challenges.</p>
                </div>

                <div class="flex flex-col gap-12 mx-auto md:flex-row md:gap-6">
                    <img src="storage/images/about1.png" alt="About Us Image"
                         class="w-[80vw] h-[30vh]  md:object-cover rounded-lg shadow-md ">
                    <img src="storage/images/about2.png" alt="About Us Image"
                         class="w-[80vw] h-[30vh] md:object-cover rounded-lg shadow-md ">
                </div>
            </div>
        </div>
    </section>

    {{-- web site overview --}}
    <section class="bg-[#223654] rounded-lg w-[80%] h-auto md:h-[100vh] mx-auto">
        <div class="container mx-auto">
            <!-- Title Section -->
            <div class="mb-8 text-center">
                <h1 class="font-bold text-white text-5xl mt-8">Title</h1>
            </div>
            <div class="flex flex-col md:flex-row justify-center items-start md:items-center md:justify-between relative overflow-hidden">
                <ul class=" flex flex-col justify-center items-center ml-32 md:flex flex-col gap-8 text-white text-xl mb-8 md:mb-0 md:w-[10%]">
                    <li class="md:text-center md:border-b-4 border-yellow-500 cursor-pointer" onclick="changeSlide(0)"> Learn</li>
                    <li class="md:text-center cursor-pointer" onclick="changeSlide(1)">Envirement</li>
                    <li class="md:text-center cursor-pointer" onclick="changeSlide(2)">Complaint</li>
                </ul>
                <div class="w-full md:w-[60%] h-auto md:h-[40%] mx-auto my-auto rounded-lg flex overflow-hidden">
                    <div id="imageSlider" class="flex transition-transform duration-500 ease-in-out">
                        <img src="storage/images/about1.png" alt="" class="w-full h-auto md:w-full md:h-[70vh]">
                        <img src="storage/images/about2.png" alt="" class="w-full h-auto md:w-full md:h-[70vh]">
                        <img src="storage/images/about1.png" alt="" class="w-full h-auto md:w-full md:h-[70vh]">
                    </div>
                </div>
            </div>

            <div class="mt-8 md:flex md:justify-between">
                <div class="md:w-[30%]">
                    <!-- Additional content -->
                </div>
                <div class="md:w-[65%]">
                    <!-- Additional content -->
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="max-w-lg">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl p-4 border-b-4 border-yellow-500">
                        Community</h2>
                    <p class="mt-4 text-gray-600 text-lg p-4">Connect with other like-minded cyber security students and join our huge community. Ask questions, share
                        knowledge and meet people on the same journey as you</p>
                </div>

            </div>
        </div>
    </section>

    {{-- comments  --}}

    <section class="px-4">
        <div class="grid gap-6 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
            <div class="max-w-lg mx-auto border border-yellow-500 px-6 py-4 rounded-3xl">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Avatar"
                         class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="text-lg font-medium text-gray-800">John Doe</div>
                        <div class="text-gray-500">2 hours ago</div>
                    </div>
                </div>
                <p class="text-lg leading-relaxed mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    sit
                    amet lorem nulla. Donec consequat urna a tortor sagittis lobortis.</p>
                <div class="flex justify-between items-center">

                </div>
            </div>

            <div class="max-w-lg mx-auto border border-yellow-500 px-6 py-4 rounded-3xl">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Avatar"
                         class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="text-lg font-medium text-gray-800">John Doe</div>
                        <div class="text-gray-500">2 hours ago</div>
                    </div>
                </div>
                <p class="text-lg leading-relaxed mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    sit
                    amet lorem nulla. Donec consequat urna a tortor sagittis lobortis.</p>
                <div class="flex justify-between items-center">

                </div>
            </div>

            <div class="max-w-lg mx-auto border border-yellow-500 px-6 py-4 rounded-3xl">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Avatar"
                         class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="text-lg font-medium text-gray-800">John Doe</div>
                        <div class="text-gray-500">2 hours ago</div>
                    </div>
                </div>
                <p class="text-lg leading-relaxed mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    sit
                    amet lorem nulla. Donec consequat urna a tortor sagittis lobortis.</p>
                <div class="flex justify-between items-center">

                </div>
            </div>

            <div class="max-w-lg mx-auto border border-yellow-500 px-6 py-4 rounded-3xl">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Avatar"
                         class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="text-lg font-medium text-gray-800">John Doe</div>
                        <div class="text-gray-500">2 hours ago</div>
                    </div>
                </div>
                <p class="text-lg leading-relaxed mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    sit
                    amet lorem nulla. Donec consequat urna a tortor sagittis lobortis.</p>
                <div class="flex justify-between items-center">

                </div>
            </div>

            <div class="max-w-lg mx-auto border border-yellow-500 px-6 py-4 rounded-3xl mb-8">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Avatar"
                         class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="text-lg font-medium text-gray-800">John Doe</div>
                        <div class="text-gray-500">2 hours ago</div>
                    </div>
                </div>
                <p class="text-lg leading-relaxed mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    sit
                    amet lorem nulla. Donec consequat urna a tortor sagittis lobortis.</p>
                <div class="flex justify-between items-center">

                </div>
            </div>

            <div class="max-w-lg mx-auto border border-yellow-500 px-6 py-4 rounded-3xl mb-8">
                <div class="flex items-center mb-6">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg" alt="Avatar"
                         class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="text-lg font-medium text-gray-800">John Doe</div>
                        <div class="text-gray-500">2 hours ago</div>
                    </div>
                </div>
                <p class="text-lg leading-relaxed mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    sit
                    amet lorem nulla. Donec consequat urna a tortor sagittis lobortis.</p>
                <div class="flex justify-between items-center">

                </div>
            </div>

        </div>
    </section>

    <footer>
        <div class="bg-black py-4 text-gray-400">
            <div class="container px-4 mx-auto">
                <h1 class="font-bold text-white text-4xl p-8 text-center">Ready to start learning cyber security?</h1>
                <div class="-mx-4 flex flex-wrap justify-between">
                    <div class="px-4 my-4 w-full xl:w-1/5">
                        <a href="/" class="block w-52 ">
                            <img src="storageimages/logo.png" alt="">
                        </a>
                        <p class="text-justify">
                            Copyright TryHackMe 2018-2023 <br>
                            128 City Road, London, EC1V 2NX /p>
                    </div>

                    <div class="px-4 my-4 w-full sm:w-auto">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Company</h2>
                        </div>
                        <ul class="leading-8">
                            <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                            <li><a href="#" class="hover:text-blue-400">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="hover:text-blue-400">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-blue-400">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="px-4 my-4 w-full sm:w-auto">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Company</h2>
                        </div>
                        <ul class="leading-8">
                            <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                            <li><a href="#" class="hover:text-blue-400">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="hover:text-blue-400">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-blue-400">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="px-4 my-4 w-full sm:w-auto">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Blog</h2>
                        </div>
                        <ul class="leading-8">
                            <li><a href="#" class="hover:text-blue-400">Getting Started With HTML and CSS</a>
                            </li>
                            <li><a href="#" class="hover:text-blue-400">What Is Flex And When to Use It?</a>
                            </li>
                            <li><a href="#" class="hover:text-blue-400">How TailwindCSS Can Help Your
                                    Productivity?</a>
                            </li>
                            <li><a href="#" class="hover:text-blue-400">5 Tips to Make Responsive Website</a>
                            </li>
                            <li><a href="#" class="hover:text-blue-400">See More</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        let currentSlide = 0;
        const totalSlides = document.querySelectorAll('#imageSlider img').length;

        function changeSlide(index) {
            const slideWidth = document.querySelector('#imageSlider img').clientWidth;
            const newSlide = index * -slideWidth;
            document.getElementById('imageSlider').style.transform = `translateX(${newSlide}px)`;
            currentSlide = index;
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            changeSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            changeSlide(currentSlide);
        }
    </script>


    </body>

    </html>

@endsection
