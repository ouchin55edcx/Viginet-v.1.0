@extends('layouts.navbar')

@section('content')
    <section class="bg-white dark:bg-gray-900 flex justify-between"
        style="background-image: url('storage/images/learnbg.png'); background-size: cover; object-fit: cover; width: 100%;">
        <div class="py-8 mx-12 ">
            <h1 class="mb-4 text-5xl font-extrabold text-white">Learn</h1>
            <div class="flex items-center gap-2 bg-[#05192D] max-w-sm p-1 rounded">
                <img src="storage/images/news.png" alt="" class="w-6 h-6">
                <h2 class="text-white">Hands-on Hacking</h2>
            </div>
            <p class="mb-8 mt-4 text-lg font-normal text-white">Our content is guided with interactive exercises based
                on real world scenarios, from <br>
                hacking machines to investigating attacks, we've got you covered.</p>
        </div>
        <div class="hidden md:flex items-center justify-end mx-12">
            <img src="storage/images/learn.png" alt="">
        </div>
    </section>


    <section class="mt-8 md:ml-8">
        <div class="p-4 mx-auto">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-black">From the blog
                </h1>
                <p class="text-gray-600">Get started with the fundamentals of penetration testing. Learn how to
                    identify vulnerabilities, exploit weaknesses, and secure systems.</p>
            </div>
        </div>
    </section>



    <!-- com    ponent -->
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
                    
                <!-- Add more items as needed -->
            </div>
        </div>
    </div>
@endsection