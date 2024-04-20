@extends('layouts.navbar')

@section('content')
    <section class="bg-white dark:bg-gray-900 flex justify-between" style="background-image: url('storage/images/learnbg.png'); background-size: cover; object-fit: cover; width: 100%;">
        <div class="py-8 mx-12 ">
            <h1 class="mb-4 text-5xl font-extrabold text-white">Search</h1>
            <div class="flex items-center gap-2 bg-[#05192D] max-w-sm p-1 rounded">
                <img src="storage/images/searsh1.png" alt="" class="w-6 h-6">
                <h2 class="text-white">Search over 700 courses</h2>
            </div>
            <p class="mb-8 mt-4 text-lg font-normal text-white">Search hundreds of walkthroughs and challenges by security category or difficulty.</p>
        </div>
        <div class="hidden md:flex items-center justify-end mx-12">
            <img src="storage/images/searshdiv.png" alt="">
        </div>
    </section>

    <div class="flex flex-col sm:flex-row justify-around gap-4 sm:gap-8">
        <!-- Search Input -->
        <div class="relative flex items-center w-full sm:w-auto p-4">
            <input
                type="text"
                id="searchInput"
                placeholder="Search by title"
                class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500"
            >
            <button class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Display Lessons -->
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-2" id="lessons-container">
        @foreach($lessons as $lesson)
            <div class="max-w-2xl mx-auto mt-8 flex flex-col p-2">
                <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start relative">
                    <div>
                        <div class="flex justify-between gap-2 py-2">
                            <div class="relative w-32 h-32 flex-shrink-0">
                                <img class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50" loading="lazy" src="https://tryhackme.com/r/path/outline/presecurity">
                            </div>
                            <div class="text-center flex flex-col items-center justify-center">
                                <p class="text-xl font-bold text-center">{{$lesson->title}}</p>
                                <p class="text-gray-500 text-center">{{$lesson->description}}</p>
                            </div>
                        </div>
                        <div class="h-10 flex justify-between items-center px-3 border-2 border-gray-300">
                            <h3 class="text-white font-bold bg-gray-700 rounded-full m-1 p-1">{{$lesson->category->name}}</h3>
                            <p class="text-blue-400">Info</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- Pagination Links -->
    <div class="mt-4 flex justify-center">
        <div class="bg-white px-4 py-3 flex justify-between border-gray-200">
            {{ $lessons->links() }}
        </div>
    </div>


<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('searchInput').addEventListener('input', function() {
                searchLessons(this.value);
            });
        });

        function searchLessons(keyword) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '{{ route("search.show", ["search" => "_VALUE_"]) }}'.replace('_VALUE_', keyword), true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    var data = JSON.parse(xhr.responseText);
                    var lessonsHtml = '';

                    data.lessons.forEach(function(lesson) {
                        lessonsHtml += `
                        <div class="max-w-2xl mx-auto mt-8 flex flex-col p-2">
                            <div class="flex gap-3 bg-white border border-gray-300 rounded-xl overflow-hidden items-center justify-start relative">
                                <div>
                                    <div class="flex justify-between gap-2 py-2">
                                        <div class="relative w-32 h-32 flex-shrink-0">
                                            <img class="absolute left-0 top-0 w-full h-full object-cover object-center transition duration-50" loading="lazy" src="https://tryhackme.com/r/path/outline/presecurity">
                                        </div>
                                        <div class="text-center flex flex-col items-center justify-center">
                                            <p class="text-xl font-bold text-center">${lesson.title}</p>
                                            <p class="text-gray-500 text-center">${lesson.description}</p>
                                        </div>
                                    </div>
                                    <div class="h-10 flex justify-between items-center px-3 border-2 border-gray-300">
                                        <h3 class="text-white font-bold bg-gray-700 rounded-full m-1 p-1">${lesson.category.name}</h3>
                                        <p class="text-blue-400">Info</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    });

                    document.getElementById('lessons-container').innerHTML = lessonsHtml;
                } else {
                    console.error('Request failed with status ' + xhr.status);
                }
            };

            xhr.send();
        }
    </script>

@endsection
