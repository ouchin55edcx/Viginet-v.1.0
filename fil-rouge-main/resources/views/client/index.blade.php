@extends('layouts.navbar')

@section('content')

    <div class="h-full bg-gray-200 p-8 mt-16">

        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="storage/images/image.png"
                     class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <div class="flex flex-col items-center -mt-20">
                    <form method="POST" action="{{ route('client.updateImage', $userInfo->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="relative">
                            @if ($userInfo->image)
                                <img src="{{'storage/' . $userInfo->image->path }}"
                                     class="w-40 border-4 border-white rounded-full">
                            @else
                                <img src="{{ asset('storage/images/defaultImg.jpg') }}"
                                     class="w-40 border-4 border-white rounded-full">
                            @endif
                            <label for="image"
                                   class="absolute bottom-0 right-0 bg-blue-500 rounded-full p-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </label>
                            <input type="file" id="image" name="image" class="hidden" accept="image/*"></div>
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Update
                            Image
                        </button>
                    </form>
                    <div class="flex items-center space-x-2 mt-2">

                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                  d="M5 13l4 4L19 7"></path>
                        </svg>
                        </span>
                    </div>
                </div>
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">{{auth()->user()->username}}</p>
                    <span class="bg-blue-500 rounded-full p-1" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                  d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">
                </div>
            </div>
        </div>


        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col ">


                <!-- update.blade.php -->
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Informations Personnelles</h4>
                    <form method="POST" action="{{ route('client.update', $userInfo->id) }}">
                        @csrf
                        @method('PUT')

                        <ul class="mt-2 text-gray-700">
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Username :</span>
                                <input type="text" name="username" class="text-gray-700 flex-1 outline-none"
                                       value="{{ old('username', $userInfo->user->username) }}">
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Phone :</span>
                                <input type="text" name="phone" class="text-gray-700 flex-1 outline-none"
                                       value="{{ old('phone', $userInfo->phone_number) }}">
                            </li>
                            <li class="flex border-b py-2">
                                <span class="font-bold w-24">Email :</span>
                                <input type="text" name="email" class="text-gray-700 flex-1 outline-none"
                                       value="{{ old('email', $userInfo->user->email) }}">
                            </li>
                            <li class="flex border-y py-2">
                                <span class="font-bold w-24">Address:</span>
                                <input type="text" name="address" class="text-gray-700 flex-1 outline-none"
                                       value="{{ old('address', $userInfo->address) }}">
                            </li>
                        </ul>
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Save
                            Changes
                        </button>
                    </form>
                </div>


                {{--     saved post --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    @foreach ($savedPosts as $post)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            {{--                    <div class="relative">--}}
                            {{--                        <img src="{{ $post->featured_image ?: 'https://via.placeholder.com/640x360' }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">--}}
                            {{--                        <div class="absolute top-0 left-0 px-4 py-2 bg-gray-800 text-white text-sm font-semibold rounded-tr-lg">--}}
                            {{--                            {{ $post->category->name }}--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                            <div class="p-6">
                                <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                                <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 150) }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">
                                        <span>By {{ $post->user->name }}</span>
                                        <span class="mx-1">•</span>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                    <a href="#" class="text-blue-500 hover:text-blue-700">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                {{-- Courses --}}
                @foreach ($lessons as $lesson)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <img class="h-20 w-20 object-cover" src="{{ asset('storage/' . $lesson->image_path) }}"
                                         alt="{{ $lesson->lesson_title }}">
                                </a>
                            </div>
                            <div class="flex-1 px-4 py-2">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $lesson->lesson_title }}</h3>
                                <div class="mt-2">
                                    <div class="relative pt-1">
                                        <div class="flex mb-2 items-center justify-between">
                                            <div>
                                <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                    {{ $lesson->completed_tasks_count }} / {{ $lesson->total_tasks_count }} Tasks
                                </span>
                                            </div>
                                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block text-green-600">
                                    {{ round(($lesson->completed_tasks_count / $lesson->total_tasks_count) * 100) }}%
                                </span>
                                            </div>
                                        </div>
                                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                                            <div
                                                style="width:{{ ($lesson->completed_tasks_count / $lesson->total_tasks_count) * 100 }}%"
                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Complainte --}}
                <h1 class="text-center text-2xl font-bold mb-4">My Complaints</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($complaints as $complaint)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-lg font-semibold text-gray-800">Complaint ID: {{ $complaint->id }}</h2>
                                        <p class="text-sm text-gray-600">Status: {{ ucfirst($complaint->status) }}</p>
                                    </div>
                                    <div class="text-gray-600">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $complaint->status === 'approved' ? 'green-100 text-green-800' : 'red-100 text-red-800' }}">
                            {{ $complaint->status }}
                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200">
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ strlen($complaint->description) > 50 ? substr($complaint->description, 0, 50) . '...' : $complaint->description }}</dd>
                                </div>
                            </div>
                            <div class="px-6 py-4 flex justify-between">
                                @if ($complaint->report->isNotEmpty())
                                    <a href="#" onclick="downloadPDF({{ $complaint->report->first()->id }}); return false;" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Download Report
                                    </a>
                                @endif
                                <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Cancel
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex-1 bg-white rounded-lg shadow-xl p-8 mt-8">
                    <div class="flex  justify-between border-b-2 border-gray-700">
                        <div>
                            <h4 class="">Your Content </h4>
                        </div>
                        <div class="relative m-4">
                            <!-- Select Option -->
                            <select>
                                <option value="">Select Option</option>
                                <option value="questions-section">Questions</option>
                                <option value="posts-section">Posts</option>
                            </select>

                        </div>
                    </div>
                    <!-- Content Display Based on Selection -->
                    <div class="mt-4">


                        <!-- Display Questions -->
                        <div id="questions-section" class="hidden">
                            <h5 class="font-bold text-lg text-gray-900 mb-2">Your Questions</h5>
                            @if ($questions->count() > 0)
                                @foreach($questions as $question)
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-500">
                                                                Question
                                                                Posted {{ $question->created_at->diffForHumans() }}
                                                            </div>
                                                            <div class="text-2xl font-bold text-gray-900">
                                                                <a href="#"
                                                                   class="underline text-black hover:text-blue-700">{{ $question->content }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        Comments
                                                    </div>
                                                    <div class="text-2xl font-bold text-gray-900">
                                                        {{$question->askanswer_count}}
                                                    </div>
                                                </td>
                                                <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <button class="edit-question-btn"
                                                            data-question-id="{{ $question->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                             viewBox="0 0 24 24" width="20px" fill="#92929D">
                                                            <path d="M0 0h24v24H0V0z" fill="none"/>
                                                            <path
                                                                d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM21.41 6.34l-3.75-3.75-2.53 2.54 3.75 3.75 2.53-2.54z"/>
                                                        </svg>
                                                    </button>

                                                    <div id="question-popup-{{ $question->id }}"
                                                         class="fixed z-50 inset-0 overflow-y-auto hidden">
                                                        <div class="flex items-center justify-center min-h-screen">
                                                            <div
                                                                class="bg-white rounded-lg shadow-lg p-6 relative max-w-md w-full">
                                                                <button
                                                                    class="close-question-btn absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         height="18px" viewBox="0 0 24 24" width="18px"
                                                                         fill="currentColor">
                                                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                                                        <path
                                                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                                                                    </svg>
                                                                </button>
                                                                <h3 class="text-lg font-medium mb-4">Edit Question</h3>
                                                                <form action="{{ route('asks.update', $question->id) }}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-4">
                                                                        <label
                                                                            class="block text-gray-700 font-bold mb-2"
                                                                            for="content">Content</label>
                                                                        <textarea
                                                                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                                            id="content" name="content" rows="3"
                                                                            placeholder="Enter question content">{{ $question->content }}</textarea>
                                                                    </div>
                                                                    <div class="flex justify-end">
                                                                        <button
                                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                                                            type="submit">Update
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form action="{{ route('asks.destroy', $question->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete-question-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                                 viewBox="0 0 24 24" width="20px" fill="#92929D">
                                                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                                                <path
                                                                    d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @else
                                <p>No Question found.</p>
                            @endif
                        </div>


                        <script !src="">
                            document.addEventListener('DOMContentLoaded', function () {
                                const editButtons = document.querySelectorAll('.edit-question-btn');

                                editButtons.forEach(button => {
                                    button.addEventListener('click', function (event) {
                                        event.preventDefault();

                                        const questionId = this.getAttribute('data-question-id');
                                        const popup = document.getElementById(`question-popup-${questionId}`);

                                        if (popup) {
                                            popup.classList.remove('hidden');
                                            document.body.classList.add('overflow-hidden'); // Optional: Prevent scrolling of background
                                        }

                                        // Close popup when clicking the close button
                                        const closeButton = popup.querySelector('.close-question-btn');
                                        if (closeButton) {
                                            closeButton.addEventListener('click', function (event) {
                                                event.preventDefault();
                                                popup.classList.add('hidden');
                                                document.body.classList.remove('overflow-hidden'); // Optional: Enable scrolling again
                                            });
                                        }
                                    });
                                });
                            });

                        </script>



                        <!-- Display Posts -->
                        <div id="posts-section" class="hidden">
                            <h5 class="font-bold text-lg text-gray-900 mb-2">Your Posts</h5>
                            @if ($posts->count() > 0)
                                @foreach($posts as $post)
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm text-gray-500">
                                                                Post . posted
                                                                in {{ $post->created_at->diffForHumans() }}
                                                            </div>
                                                            <div class="text-2xl font-bold text-gray-900">
                                                                <a href=""
                                                                   class="underline text-black hover:text-blue-700">{{$post->title}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        Upvotes
                                                    </div>
                                                    <div class="text-2xl font-bold text-gray-900">
                                                        {{$post->liked_by_clients_count}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        comments
                                                    </div>
                                                    <div class="text-2xl font-bold text-gray-900">
                                                        {{$post->comments_count}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <button class="edit-post-btn" data-post-id="{{ $post->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                             viewBox="0 0 24 24" width="20px" fill="#92929D">
                                                            <path d="M0 0h24v24H0V0z" fill="none"/>
                                                            <path
                                                                d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM21.41 6.34l-3.75-3.75-2.53 2.54 3.75 3.75 2.53-2.54z"/>
                                                        </svg>
                                                    </button>

                                                    <div id="post-popup-{{ $post->id }}"
                                                         class="fixed z-50 inset-0 overflow-y-auto hidden">
                                                        <div class="flex items-center justify-center min-h-screen">
                                                            <div
                                                                class="bg-white rounded-lg shadow-lg p-6 relative max-w-md w-full">
                                                                <button
                                                                    class="close-post-btn absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         height="18px" viewBox="0 0 24 24" width="18px"
                                                                         fill="currentColor">
                                                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                                                        <path
                                                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                                                                    </svg>
                                                                </button>
                                                                <h3 class="text-lg font-medium mb-4">Edit Post</h3>
                                                                <form action="{{ route('posts.update', $post->id) }}"
                                                                      method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-4">
                                                                        <label
                                                                            class="block text-gray-700 font-bold mb-2"
                                                                            for="title">
                                                                            Title
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                                            id="title" name="title" type="text"
                                                                            placeholder="Enter post title"
                                                                            value="{{ $post->title }}">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label
                                                                            class="block text-gray-700 font-bold mb-2"
                                                                            for="content">
                                                                            Content
                                                                        </label>
                                                                        <textarea
                                                                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                                            id="content" name="content" rows="3"
                                                                            placeholder="Enter post content">{{ $post->content }}</textarea>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label
                                                                            class="block text-gray-700 font-bold mb-2"
                                                                            for="image">
                                                                            Image
                                                                        </label>
                                                                        <input
                                                                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                                            id="image" name="image[]" type="file">
                                                                    </div>
                                                                    <div class="flex justify-end">
                                                                        <button
                                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                                                            type="submit">
                                                                            Update
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form action="{{ route('posts.destroy', $post->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete-post-btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                                 viewBox="0 0 24 24" width="20px" fill="#92929D">
                                                                <path d="M0 0h24v24H0V0z" fill="none"/>
                                                                <path
                                                                    d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @else
                                <p>No posts found.</p>
                            @endif
                        </div>


                        <script !src="">
                            document.addEventListener('DOMContentLoaded', function () {
                                const editButtons = document.querySelectorAll('.edit-post-btn');

                                editButtons.forEach(button => {
                                    button.addEventListener('click', function (event) {
                                        event.preventDefault();

                                        const postId = this.getAttribute('data-post-id');
                                        const popup = document.getElementById(`post-popup-${postId}`);

                                        if (popup) {
                                            popup.classList.remove('hidden');
                                            document.body.classList.add('overflow-hidden');
                                        }

                                        // Close popup when clicking the close button
                                        const closeButton = popup.querySelector('.close-post-btn');
                                        if (closeButton) {
                                            closeButton.addEventListener('click', function (event) {
                                                event.preventDefault();
                                                popup.classList.add('hidden');
                                                document.body.classList.remove('overflow-hidden');
                                            });
                                        }
                                    });
                                });
                            });

                        </script>




                        <!--select content -->
                        <script>
                            document.querySelector('select').addEventListener('change', function () {
                                document.querySelectorAll('#questions-section, #posts-section').forEach(function (element) {
                                    element.classList.add('hidden');
                                });

                                var selectedOption = this.value;

                                if (selectedOption) {
                                    document.getElementById(selectedOption).classList.remove('hidden');
                                }
                            });
                        </script>


                        <!--dowloand pdf  -->
                        <script>
                            function downloadPDF(reportId) {
                                // Send an AJAX request to the Laravel route
                                fetch(`/reports/${reportId}/download`, {
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                })
                                    .then(response => response.blob())
                                    .then(blob => {
                                        // Create a temporary anchor element
                                        const link = document.createElement('a');
                                        link.href = window.URL.createObjectURL(blob);
                                        link.download = 'report.pdf';
                                        link.click();

                                        // Clean up the temporary object URL
                                        window.URL.revokeObjectURL(link.href);
                                    })
                                    .catch(error => {
                                        console.error('Failed to download PDF:', error);
                                    });
                            }
                        </script>


                    </div>

                </div>


            </div>

@endsection
