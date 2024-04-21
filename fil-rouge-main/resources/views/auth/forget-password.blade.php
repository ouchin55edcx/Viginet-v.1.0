@extends('layouts.navbar')

@section('content')
    <section class="bg-[#161E2D] h-36 w-full flex  items-center gap-4 mt-14">

        <div class="md:ml-52 ml-20">
            <img src="storage/images/Vector.png" alt="">
        </div>
        <div>
            <h1 class="md:text-white font-bold md:text-3xl text-xl text-white">Forgot Password</h1>
            <span class="md:text-gray-400 text-small text-gray-400">Enter your email below to receive a special link to reset your password </span>
        </div>
    </section>

    <section>
        <div class="m-16 w-[72vw] mx-auto">
            <form method="POST" action="#" id="resetPasswordForm">
                @csrf
                <div class="mb-4">
                    <label for="login" class="block text-sm font-medium text-gray-700">Username or Email</label>
                    <input type="text" id="login" name="login" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <button type="submit" class="border border-yellow-500 bg-yellow-500 text-white rounded-full px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                    Request Password Reset
                </button>
            </form>
        </div>
    </section>
    <!-- component -->
    <footer>
        <div class="bg-black py-4 text-gray-400">
            <div class="container px-4 mx-auto">
                <h1 class="font-bold text-white text-4xl p-8 text-center">Ready to start learning cyber security?</h1>
                <div class="-mx-4 flex flex-wrap justify-between">
                    <div class="px-4 my-4 w-full sm:w-auto">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Company</h2>
                        </div>
                        <ul class="leading-8">
                            <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                            <li><a href="#" class="hover:text-blue-400">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <div class="px-4 my-4 w-full sm:w-auto">
                        <div>
                            <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Company</h2>
                        </div>
                        <ul class="leading-8">
                            <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                            <li><a href="#" class="hover:text-blue-400">Terms &amp; Conditions</a></li>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/resetPasswordForm.js"></script>
@endsection
