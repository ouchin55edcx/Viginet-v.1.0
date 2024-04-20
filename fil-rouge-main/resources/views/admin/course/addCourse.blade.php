@extends('layouts.sidebar')

@section('content')
    <div class="bg-blue-500 py-12 px-4">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Explore Cyber Security Courses</h1>
            <p class="text-lg mb-8">Gain valuable skills in cybersecurity with our comprehensive courses.</p>
            <!-- Hero Section Form -->
            <div id="multi-step-form" class="bg-white rounded-md shadow-lg p-8">
                <!-- Step 1: Course Details -->
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
                        <button type="submit" id="next-btn" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
