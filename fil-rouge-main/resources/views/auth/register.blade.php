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
            <form method="POST" action="{{ route('register.store') }}" id="registrationForm">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500 px-4" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class= " p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class=" p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                        <option value="">Select Role</option>
                        <option value="Client">Client</option>
                        <option value="Expert">Expert</option>
                    </select>
                </div>
                <div id="client-fields" class="hidden">
                    <!-- Client-specific fields -->
                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="address" name="address" class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500">
                    </div>
                </div>
                <div id="expert-fields" class="hidden">
                    <!-- Expert-specific fields -->
                    <div class="mb-4">
                        <label for="certificate" class="block text-sm font-medium text-gray-700">Certificate</label>
                        <input type="text" id="certificate" name="certificate" class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                        <input type="text" id="experience" name="experience" class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500">
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-full px-4 py-2 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline">
                        Sign Up
                    </button>
                    <div class="text-center mx-4">
                        <span class="text-gray-600">Already have an account?</span>
                        <a href="{{ route('login.index') }}" class="text-blue-400 hover:text-blue-600">Log in</a>
                    </div>
                </div>

            </form>
        </div>





    </section>

    <script src="js/register.js"></script>

@endsection
