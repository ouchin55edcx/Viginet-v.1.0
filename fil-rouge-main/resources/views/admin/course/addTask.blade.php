@extends('layouts.sidebar')

@section('content')
    <div id="multi-step-form" class="max-w-3xl mx-auto">
        <!-- Step 1: Task Details -->
        <div id="step-1" class="form-step">
            <h2 class="text-3xl font-bold mb-8 text-center">Add New Task</h2>
            <form method="POST" action="{{ route('admin.course.addTask.store') }}" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md">
                @csrf
                <div class="mb-6">
                    <label for="course-category" class="block font-semibold mb-2">Category:</label>
                    <select name="category" id="course-category" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="task-title" class="block font-semibold mb-2">Title:</label>
                    <input type="text" id="task-title" name="task-title" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="task-content" class="block font-semibold mb-2">Content:</label>
                    <textarea id="task-content" name="task-content" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
                </div>
                <div class="mb-6">
                    <label for="course-image" class="block font-semibold mb-2">Image:</label>
                    <input type="file" name="image" id="course-image" accept="image/*" class="border border-gray-300 px-4 py-3 w-full" required>
                </div>
                <div class="mb-6">
                    <label for="task-question" class="block font-semibold mb-2">Question:</label>
                    <input type="text" id="task-question" name="task-question" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label class="block font-semibold mb-2">Options:</label>
                    <div class="task-options grid grid-cols-2 gap-4">
                        <input type="text" name="options[]" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Option 1" required>
                        <input type="text" name="options[]" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Option 2" required>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="correct-choice" class="block font-semibold mb-2">Correct Choice:</label>
                    <input type="text" id="correct-choice" name="correct-choice" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md transition duration-300 ease-in-out">Submit</button>
            </form>
        </div>
    </div>
@endsection
