@extends('layouts.sidebar')

@section('content')
    <div class="py-12 px-4">
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 py-12 px-4">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between max-w-screen-xl mx-auto">
                <div class="flex items-center mb-4 lg:mb-0">
                    <img src="path/to/your/cybersecurity_logo.svg" alt="Cybersecurity Platform Logo" class="w-12 h-12 mr-4">
                    <h1 class="text-3xl font-bold text-white">Cybersecurity Platform Admin</h1>
                </div>
            </div>
            <div class="mt-8 text-center text-white lg:mt-12">
                <p class="text-lg mb-4">Manage and administer your cybersecurity training platform efficiently.</p>
                <button type="button" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">Add New Course</button>
            </div>
        </div>


        <div id="multi-step-form" class="bg-white rounded-md shadow-lg p-8">
                <div id="step-1" class="form-step">
                    <h2 class="text-2xl font-bold mb-4">Course Details</h2>
                    <form method="POST" action="{{ route('admin.course.addCourse.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="course-title" class="block text-gray-700 font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="course-title" class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="course-image" class="block text-gray-700 font-bold mb-2">Image:</label>
                            <input type="file" name="image" id="course-image" accept="image/*" class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="course-category" class="block text-gray-700 font-bold mb-2">Category:</label>
                            <select name="category" id="course-category" class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="course-description" class="block text-gray-700 font-bold mb-2">Description:</label>
                            <textarea name="description" id="course-description" class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
                        </div>
                        <button type="submit"
                        <button type="submit" id="next-btn" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">Next</button>
                    </form>
                </div>

                <div id="step-2" class="form-step hidden">
                    <h2 class="text-2xl font-bold mb-4">Course Tasks</h2>
                    <p class="text-gray-700 mb-4">Add tasks to define the learning modules for this course.</p>

                    <div class="task-wrapper">
                        <div class="mb-4">
                            <label for="task-title-1" class="block text-gray-700 font-bold mb-2">Task Title:</label>
                            <input type="text" name="tasks[1][title]" id="task-title-1" class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="mb-4">
                            <label for="task-content-1" class="block text-gray-700 font-bold mb-2">Task Content:</label>
                            <textarea name="tasks[1][content]" id="task-content-1" class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="task-image-1" class="block text-gray-700 font-bold mb-2">Task Image (Optional):</label>
                            <input type="file" name="tasks[1][image]" id="task-image-1" accept="image/*" class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>

                    <button type="button" id="add-task-btn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">Add Another Task</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">Create Course</button>
                </div>
            </div>
        </div>
    </div>
@endsection
