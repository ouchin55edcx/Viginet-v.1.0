@extends('layouts.sidebar')

@section('content')
    <div id="multi-step-form" class="max-w-3xl mx-auto">
        <!-- Step 1: Course Details -->
        <div id="step-1" class="form-step">
            <div id="step-1" class="form-step">
                <h2 class="text-2xl font-bold mb-4">Task Details</h2>
            </div>
            <form method="POST" action="{{ route('admin.course.addTask.store') }}" enctype="multipart/form-data" class="bg-gray-200 p-6 rounded-lg shadow-md">
                @csrf
                <div class="mb-4">
                    <label for="course-category" class="block font-bold mb-2">Category:</label>
                    <select name="category" id="course-category" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="task-title" class="block font-bold mb-2">Title:</label>
                    <input type="text" id="task-title" name="task-title" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="task-content" class="block font-bold mb-2">Content:</label>
                    <textarea id="task-content" name="task-content" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="course-image" class="block font-bold mb-2">Image:</label>
                    <input type="file" name="image" id="course-image" accept="image/*" class="border border-gray-400 px-3 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="task-question" class="block font-bold mb-2">Question:</label>
                    <input type="text" id="task-question" name="task-question" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-2">Options:</label>
                    <div class="task-options flex flex-wrap mb-2">
                        <input type="text" name="options[]" class="w-auto px-3 py-2 mr-2 mb-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <input type="text" name="options[]" class="w-auto px-3 py-2 mr-2 mb-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="correct-choice" class="block font-bold mb-2">Correct Choice:</label>
                    <input type="text" id="correct-choice" name="correct-choice" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </form>
@endsection
