@extends('layouts.navbar')

@section('content')
    <section class="relative py-20" style="background-image: url('{{ asset('storage/' . $thisCategory->image->path) }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-800 to-black opacity-90"></div>
        <div class="container mx-auto px-4 ml-12 mt-12 text-white relative z-10">
            <h2 class="text-3xl font-bold mb-4 md:mb-6">LEARNING PATH</h2>
            <h1 class="text-5xl font-bold mb-6">SOC Level 2</h1>
            <p class="text-lg text-gray-200 mb-8 max-w-xl">Completing this path will equip you with the technical skills needed to excel and advance in your Security Analyst career.</p>
            <div class="flex flex-col md:flex-row justify-start items-start mb-8 space-y-4 md:space-y-0 md:space-x-8">
                <div class="flex items-center">
                    <span class="text-lg font-semibold mr-2">HANDS-ON LABS</span>
                    <span class="bg-yellow-500 text-white px-4 py-1 rounded-full">48</span>
                </div>
                <div class="flex items-center">
                    <span class="text-lg font-semibold mr-2">DIFFICULTY LEVEL</span>
                    <span class="bg-white text-[#223654] text-sm md:text-lg px-4 py-1 rounded-full">Intermediate</span>
                </div>
            </div>
        </div>
    </section>


    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">From the blog</h1>
            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($lessons as $lesson)
                    <div class="lg:flex border-2 rounded-lg overflow-hidden hover:shadow-xl">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                             src="{{ asset('storage/' . $lesson->image->path) }}"
                             alt="Lesson Image">
                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                                {{ $lesson->title }}
                            </a>
                            <p class="truncate">{{ Str::limit($lesson->title, 80) }}</p>
                            <span class="text-sm text-gray-500 dark:text-gray-300">{{ $lesson->created_at->format('d M Y') }}</span>
                            <a href="{{ route('course_details.index', ['lessonId' => $lesson->id]) }}"
                               class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                Start course
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
