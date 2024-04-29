@extends('layouts.navbar')

@section('content')



    <section class="bg-[#161E2D] h-36 w-full flex  items-center gap-4 mt-14 ">
        <div class="ml-52">
            <img src="storage/images/Vector.png" alt="">
        </div>
        <div>
            <h1 class="text-white font-bold text-3xl">Login</h1>
            <span class="text-gray-400">welcome back ! </span>
        </div>
    </section>

    <section>
        <div class="m-16 w-[72vw] mx-auto">
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="login" class="block text-sm font-medium text-gray-700">Username or Email</label>
                    <input type="text" id="login" name="login"
                        class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="p-2 mt-1 block w-full h-10 border-2 rounded-full shadow-sm hover:border-blue-500" required>
                </div>
                <button type="submit"
                    class="border border-yellow-500 bg-yellow-500 text-white rounded-full px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                    Login
                </button>
            </form>
        </div>

        <div class="flex items-center justify-center mt-4">
            <div class="border-t-2 border-gray-300 w-full"></div>
            <div class="mx-4 text-gray-400 text"><span class="text-xl">OR</span></div>
            <div class="border-t-2 border-gray-300 w-full"></div>
        </div>


        <div class="flex justify-between mx-[13rem]">
            <h3 class="">Need an account? <span class="text-blue-400"><a href="{{ route('register.index') }}">Signup</a></span></h3>
            <h3 class="">If you forgot your password, go <span class="text-blue-400"><a
                        href="{{route('forget-password.index')}}">here</a></span></h3>
        </div>
    </section>

@endsection
