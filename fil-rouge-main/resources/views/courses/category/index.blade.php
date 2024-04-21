@extends('layouts.navbar')

@section('content')
    <section class="bg-white  flex justify-between  mt-16"
        style="background-image: url('/storage/images/learnbg.png'); background-size: cover; object-fit: cover; width: 100%;">
        <div class="py-12 mx-8 md:py-24 md:mx-16  flex flex-col gap-4 relative">
            <h1 class="text-5xl font-extrabold text-white">Learn</h1>
            <h2 class="text-lg font-semibold flex items-center gap-2">
                <span class="inline-block bg-yellow-500 text-white px-2 py-1 rounded-md">Hands-on hacking</span>
            </h2>
            <p class="mt-4 text-lg font-normal text-white">Our content is guided with interactive exercises based on real-world scenarios, from<br>hacking machines to investigating attacks, we've got you covered.</p>

            </div>

        <div class="hidden md:flex items-center justify-end mx-12">
            <img src="/storage/images/learn.png" alt="">
        </div>
    </section>
    <div class="bg-[#212c42] flex gap-4">
        <a href="#" class="ml-12 m-2 text-white text-xl px-4 py-2 rounded-md border-b-2 border-transparent border-green-500 outline-none">Learn</a>
        <a href="{{ route('search.index') }}" id="searchLink" class="m-2 text-white text-xl px-4 py-2 rounded-md border-b-2 border-transparent hover:border-green-500 focus:border-green-500 focus:outline-none">Search</a>
    </div>


    <section class="mt-8 md:ml-2">
        <div class="p-4 mx-auto">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-black">From the blog
                </h1>
                <p class="text-gray-600">Get started with the fundamentals of penetration testing. Learn how to
                    identify vulnerabilities, exploit weaknesses, and secure systems.</p>
            </div>
        </div>
    </section>



    <!-- component -->
    <div class="">
        <div class="container mx-auto mx-auto p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                <!-- Replace this with your grid items -->
                @foreach ($categories as $category)
                    <div class="bg-white rounded-lg border p-4">
                        <a href="{{route('course_list.index',['id' => $category->id])}}">
                        <img src="../storage/{{$category->image->path}}" alt="{{ $category->name }}">
                            </a>
                        <div class="px-1 py-4">
                            <div class="font-bold text-xl mb-2">{{ $category->name }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
