@extends('layouts.sidebar')

@section('content')
    <div class="bg-blue-500 text-white py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-2">Course Categories</h1>
            <p class="text-lg">Explore our wide range of course offerings.</p>
        </div>
    </div>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <div class="min-w-max overflow-hidden">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-100">
                    <span class="text-sm font-semibold">{{$count}} Courses</span>
                    <div id="button-container" class="flex flex-col items-between gap-2">
                        <button id="main-button" class="rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 flex items-center transition duration-300 ease-in-out transform hover:scale-105">
                            <span class="material-icons">add</span>
                        </button>
                        <div id="additional-buttons" class="hidden ml-2 flex flex-col gap-2">
                            <a href="{{route('addCourse.index')}}" class="rounded-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 flex items-center transition duration-300 ease-in-out transform hover:scale-105">
                                <span class="material-icons mr-2">assignment</span>
                                Add Course
                            </a>
                            <a href="{{route('addTask.index')}}" class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 ml-2 flex items-center transition duration-300 ease-in-out transform hover:scale-105">
                                <span class="material-icons mr-2">add</span>
                                Add Tasks
                            </a>
                        </div>
                    </div>
                </div>
                <table class="min-w-full">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Created_at</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach($lessons as $lesson)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 flex items-center">
                                <img class="h-8 w-8 rounded-full mr-2" src="/storage/{{$lesson->image->path}}" alt="Course Instructor">
                                {{$lesson->title}}
                            </td>
                            <td class="py-3 px-6">{{$lesson->description}}</td>
                            <td class="py-3 px-6">{{$lesson->created_at}}</td>
                            <td class="py-3 px-6 flex justify-center space-x-2">
                                <button class="px-2 py-1 bg-green-500 hover:bg-green-700 text-white rounded-md transition duration-300 ease-in-out transform hover:scale-105">Details</button>
                                <button class="px-2 py-1 bg-red-500 hover:bg-red-700 text-white rounded-md transition duration-300 ease-in-out transform hover:scale-105">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script !src="">
        const mainButton = document.getElementById('main-button');
        const additionalButtons = document.getElementById('additional-buttons');

        mainButton.addEventListener('click', function() {
            additionalButtons.classList.toggle('hidden');
        });
    </script>
@endsection
