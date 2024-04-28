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
                                <!-- Update the "Details" button -->
                                <button class="px-2 py-1 bg-green-500 hover:bg-green-700 text-white rounded-md transition duration-300 ease-in-out transform hover:scale-105"
                                        onclick="openLessonDetails({{ $lesson->id }})">
                                    Details
                                </button>

                                <!-- Hidden popup/modal for lesson details -->
                                <div id="lessonDetailsPopup" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                    <div class="bg-white p-6 rounded-lg shadow-lg">
                                        <div class="flex justify-between mb-4">
                                            <h2 id="lessonTitle" class="text-2xl font-bold"></h2>
                                            <button id="closeLessonDetails" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <img id="lessonImage" src="" alt="Course Image" class="mt-2 w-16 h-16">
                                        <p id="lessonDescription" class="mt-2"></p>
                                        <div>
                                            <h3 class="text-xl font-bold mb-2">Tasks:</h3>
                                            <ul id="lessonTasksList"></ul>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function openLessonDetails(lessonId) {
                                        const lessonDetailsPopup = document.getElementById('lessonDetailsPopup');
                                        const lessonTitle = document.getElementById('lessonTitle');
                                        const lessonImage = document.getElementById('lessonImage');
                                        const lessonDescription = document.getElementById('lessonDescription');
                                        const lessonTasksList = document.getElementById('lessonTasksList');
                                        const closeLessonDetails = document.getElementById('closeLessonDetails');

                                        console.log('Opening lesson details for lesson ID:', lessonId);

                                        // Fetch lesson details via AJAX
                                        fetch(`/lessons/${lessonId}`)
                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error('Network response was not ok');
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                console.log('Lesson details retrieved:', data);

                                                // Update popup content with lesson details
                                                lessonTitle.textContent = data.title;
                                                lessonImage.src = `/storage/${data.image.path}`;
                                                lessonDescription.textContent = data.description;

                                                // Clear previous tasks list
                                                lessonTasksList.innerHTML = '';

                                                // Populate tasks list with delete buttons
                                                data.tasks.forEach(task => {
                                                    const li = document.createElement('li');
                                                    li.textContent = task.title;

                                                    const deleteButton = document.createElement('button');
                                                    deleteButton.textContent = 'Delete';
                                                    deleteButton.classList.add('px-2', 'py-1', 'bg-red-500', 'hover:bg-red-700', 'text-white', 'rounded-md', 'transition', 'duration-300', 'ease-in-out', 'transform', 'hover:scale-105');

                                                    // Event listener for task deletion
                                                    deleteButton.addEventListener('click', () => {
                                                        deleteTask(task.id);
                                                    });

                                                    li.appendChild(deleteButton);
                                                    lessonTasksList.appendChild(li);
                                                });

                                                // Show lesson details popup
                                                lessonDetailsPopup.classList.remove('hidden');
                                            })
                                            .catch(error => {
                                                console.error('Error fetching lesson details:', error);
                                                // Handle error (e.g., display error message)
                                            });

                                        // Add event listener to close button
                                        closeLessonDetails.addEventListener('click', () => {
                                            console.log('Closing lesson details popup');
                                            lessonDetailsPopup.classList.add('hidden');
                                        });
                                    }

                                    function deleteTask(taskId) {
                                        // Get CSRF token from meta tag
                                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                                        // Send AJAX request to delete task by task ID
                                        fetch(`/tasks/${taskId}`, {
                                            method: 'DELETE',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
                                            },
                                        })
                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error('Network response was not ok');
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                console.log('Task deleted successfully:', data);
                                                // Handle UI update after successful deletion (e.g., remove task from list)
                                                const deletedTaskElement = document.querySelector(`#lessonTasksList li[data-task-id="${taskId}"]`);
                                                if (deletedTaskElement) {
                                                    deletedTaskElement.remove();
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error deleting task:', error);
                                                // Handle error (e.g., display error message)
                                            });
                                    }                                </script>



                                <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
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
