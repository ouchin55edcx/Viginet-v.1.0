@extends('layouts.navbar')

@section('content')


    <section class="bg-[#161E2D] h-36 w-full flex  items-center gap-4 mt-16 ">

        <div class="ml-52">
            <a href="/"><img src="storage/images/Vector.png" alt=""></a>
        </div>
        <div>
            <h1 class="text-white font-bold text-3xl">Sign Up </h1>
            <span class="text-gray-400">welcome  ! </span>
        </div>

    </section>

    <section class="">
        <div class="m-16 w-[72vw] mx-auto ">
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500 px-4" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                        <option value="">Select Role</option>
                        <option value="Client">Client</option>
                        <option value="Expert">Expert</option>
                    </select>
                </div>
                <div id="client-fields" class="hidden">
                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="mt-1 block w-full h-10 border-2rounded-full rounded-full shadow-sm hover:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="address" name="address" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500">
                    </div>
                </div>
                <div id="expert-fields" class="hidden">
                    <div class="mb-4">
                        <label for="certificate" class="block text-sm font-medium text-gray-700">Certificate</label>
                        <input type="text" id="certificate" name="certificate" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                        <input type="text" id="experience" name="experience" class="mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500">
                    </div>
                </div>
                <button type="submit" class="border border-yellow-500 bg-yellow-500 text-white rounded-full px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                    Sign Up
                </button>
            </form>
        </div>

        <div class="flex items-center justify-center mt-4">
            <div class="border-t-2 border-gray-300 w-full"></div>
            <div class="mx-4 text-gray-400 text"><span class="text-xl">OR</span></div>
            <div class="border-t-2 border-gray-300 w-full"></div>
        </div>

        <div class=" flex gap-12 mx-16 my-8">
            <a href="{{ route('google.redirect') }}">
                <button class="flex items-center bg-white border border-gray-300 rounded-lg shadow-md max-w-xs px-6 py-2 text-sm font-medium text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="-0.5 0 48 48" version="1.1">

                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Color-" transform="translate(-401.000000, -860.000000)">
                            <g id="Google" transform="translate(401.000000, 860.000000)">
                                <path
                                    d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24"
                                    id="Fill-1" fill="#FBBC05"> </path>
                                <path
                                    d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333"
                                    id="Fill-2" fill="#EB4335"> </path>
                                <path
                                    d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667"
                                    id="Fill-3" fill="#34A853"> </path>
                                <path
                                    d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24"
                                    id="Fill-4" fill="#4285F4"> </path>
                            </g>
                        </g>
                    </g>
                </svg>
                    <span>Continue with Google</span>
                </button>
            </a>
        </div>

        <div class="flex justify-between m-16">
            <h3 class="text-center">Already have an account?<span class="text-blue-400 "><a href="{{route('login.index')}}"> Log in
        </div>
    </section>

    <script>
        const roleSelect = document.getElementById('role');
        const clientFields = document.getElementById('client-fields');
        const expertFields = document.getElementById('expert-fields');

        roleSelect.addEventListener('change', () => {
            if (roleSelect.value === 'Client') {
                clientFields.classList.remove('hidden');
                expertFields.classList.add('hidden');
            } else if (roleSelect.value === 'Expert') {
                clientFields.classList.add('hidden');
                expertFields.classList.remove('hidden');
            } else {
                clientFields.classList.add('hidden');
                expertFields.classList.add('hidden');
            }
        });
    </script>

@endsection
