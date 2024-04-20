@extends('layouts.navbar')

@section('content')
    <section class=" text-[white]  bg-[#223654] overflow-y-hidden">
        <div class="flex gap-12 mx-8">
            <img src="https://assets.tryhackme.com/img/paths/presecurity.svg" alt="" class="w-24 h-32 ">
            <h1 class="text-white text-4xl font-bold mt-10">Introduction to Cyber Security</h1>
        </div>

        <div class="text-xl m-8 flex flex-col gap-12">
            <p>Cyber Security is a huge topic, and it can be challenging to know where to start. This path will give you a
                hands-on introduction to different areas within cyber, including:</p>

            <ul class="ml-24">
                <li>Careers in Cyber Security</li>
                <li>Offensive Security; hacking your first application</li>
                <li>Defensive Security; defending against a live cyber attack</li>
                <li>Exploring security topics in the industry</li>
            </ul>
        </div>

        {{-- <div class="text-xl flex flex-col  gap-8 m-12">
            <h2>No Prior Knowledge</h2>
            <p>You need no prerequisite to start this pathway! Just enthusiasm and excitement to learn!</p>
        </div> --}}
    </section>
    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">From the blog</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($lessons as $lesson)
                    <div class="lg:flex border-2">
                        {{-- @foreach ($lesson->images as $image) --}}
                            <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                                src="{{ asset('/storage/images/') }}" alt="Lesson Image">
                        {{-- @endforeach --}}

                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                                {{ $lesson->lessonTitle }}
                            </a>

                            <span
                                class="text-sm text-gray-500 dark:text-gray-300">{{ $lesson->created_at->format('d M Y') }}</span>

                            <a href="{{ route('course_details.index', ['lessonId' => $lesson->id]) }}" class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                Start course
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
