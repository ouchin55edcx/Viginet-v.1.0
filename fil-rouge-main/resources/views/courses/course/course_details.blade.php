@extends('layouts.navbar')

@section('content')

    <section class="relative py-20 bg-cover bg-center md:h-[50vh]"
             style="background-image: url('{{ asset('storage/' . $thisLesson->image->path) }}');">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900 to-black opacity-90"></div>
        <div class="container  md:ml-12  px-4 py-8 relative">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-3/4 pr-8">
                    <h1 class="text-white text-md my-4"><span>Pre Security </span>> <span class="text-gray-400">Introduction to Cyber Security </span>>
                        <span class="text-gray-500">Intro to Offensive Security</span></h1>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $thisLesson->title }}</h1>
                    <p class="text-lg md:text-xl text-white mb-6">{{ $thisLesson->description }}</p>
                    <div class="flex items-center mb-4">
                        <svg class="w-6 h-6 mr-2 text-red-500" viewBox="0 0 24 24">
                            <!-- Info icon SVG path -->
                            <path fill="currentColor"
                                  d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                        <span class="text-sm text-white">Info</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2 text-red-500" viewBox="0 0 24 24">
                            <!-- Clock icon SVG path -->
                            <path fill="currentColor"
                                  d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/>
                        </svg>
                        <span class="text-sm text-white">15 min</span>
                    </div>
                </div>
                <div class="w-96 md:w-1/4 md:mr-16 mt-8 md:mt-0 bg-[#a3ea2a] bg-opacity-80 rounded-lg p-4">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('storage/' . $thisLesson->image->path) }}" alt=""
                             class="w-24 h-24 object-cover rounded-full">
                    </div>
                    <div class="bg-gray-800 rounded-full h-2 w-full">
                        <div class="bg-red-500 rounded-full h-2" style="width: 0%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- Component -->

        <div class="my-12 mx-24  ">
            @guest()
                <div
                    class="flex justify-center items-center my-12 font-medium py-1 px-2 h-16    rounded-md text-black bg-[#dee6fb]">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-info w-5 h-5 mx-2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </div>
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        <div class="py-2">
                            <div class="text-sm font-base">To access material, start machines and answer questions<a
                                    class="text-blue-500" href="{{route('login.index')}}"> login</a></div>
                        </div>
                    </div>
                    <div class="flex flex-auto flex-row-reverse">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="feather feather-x cursor-pointer hover:text-yellow-400 rounded-full w-5 h-5 ml-2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                </div>

            @endguest

            @foreach ($tasks as $task)
                <div class="my-2">
                    <div
                        class="flex items-center justify-between bg-[#223654] pl-3 pr-2 py-3 w-full rounded text-gray-600 font-bold cursor-pointer">
                        <div class="flex gap-12">
                            <span class="text-[#ECBB0A]">Task {{ $loop->iteration }}</span>
                            <h1 class="text-white">{{ $task->title }}</h1>
                            @if ($task->is_complete)
                                <span class="text-green-500 ml-2">Completed</span>
                            @endif
                        </div>
                        <span class="h-6 w-6 flex items-center justify-center text-teal-500 toggleButton">
                    <span class="h-6 w-6 flex items-center justify-center text-teal-500">
                        <svg class="w-3 h-3 fill-current" viewBox="0 -192 469.33333 469"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m437.332031 192h-160v-160c0-17.664062-14.335937-32-32-32h-21.332031c-17.664062 0-32 14.335938-32 32v160h-160c-17.664062 0-32 14.335938-32 32v21.332031c0 17.664063 14.335938 32 32 32h160v160c0 17.664063 14.335938 32 32 32h21.332031c17.664063 0 32-14.335937 32-32v-160h160c17.664063 0 32-14.335937 32-32v-21.332031c0-17.664062-14.335937-32-32-32zm0 0"/>
                        </svg>
                    </span>
                </span>
                    </div>
                    <div class="flex flex-col hidden answer bg-gray-200 w-full border-l-4 border-red-500">
                        @if ($task->image)
                            <img src="{{ asset('storage/' . $task->image->path) }}" alt="{{ $task->title }}"
                                 class="mx-auto w-96 h-52 m-4">
                        @endif
                        <p class="text-gray-600 m-4">{{ $task->content }}</p>
                        <p class="text-gray-600 m-4">{{ $task->question }}</p>

                        <div>
                            <div class="flex items-center justify-center mt-4">
                                <div class="mx-8 text-[#A20606] text w-[25vw]"><span class="text-xl">Answer the questions below</span>
                                </div>
                                <div class="border-t-2 border-gray-400 w-full"></div>
                            </div>
                            <div class="flex flex-col gap-4 my-8">
                                <p class="ml-8 text-gray-800 text-lg font-semibold">{{ $task->question }}</p>
                                <ul class="flex flex-col gap-4 ml-16">
                                    @auth
                                        <!-- User is authenticated -->
                                        @foreach ($task->choices as $choice)
                                            @php
                                                $isCorrect = $choice->is_correct ? '1' : '0';
                                                $taskId = $task->id;
                                            @endphp

                                            <li>
                                                <button
                                                    class="answer-button w-full px-6 py-3 rounded-md focus:outline-none border-2 border-blue-500 shadow-md bg-white text-blue-500 font-semibold transition-colors duration-300 hover:bg-blue-500 hover:text-white"
                                                    data-is-correct="{{ $isCorrect }}"
                                                    data-task-id="{{ $taskId }}"
                                                    data-answer="{{ $isCorrect }}"
                                                    @if ($task->is_complete)
                                                        disabled
                                                    @endif
                                                >
                                                    {{ $choice->choice_text }}
                                                </button>
                                            </li>
                                        @endforeach
                                    @else
                                        <!-- User is not authenticated -->
                                        <li>
                                            <form action="{{ route('login.index') }}" method="GET">
                                                <button
                                                    type="submit"
                                                    class="w-full px-6 py-3 rounded-md focus:outline-none border-2 border-blue-500 shadow-md bg-white text-blue-500 font-semibold transition-colors duration-300 hover:bg-blue-500 hover:text-white"
                                                >
                                                    Log in to answer
                                                </button>
                                            </form>
                                        </li>
                                    @endauth
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const answerButtons = document.querySelectorAll('.answer-button');

            answerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const isCorrect = this.getAttribute('data-is-correct');
                    const taskId = this.getAttribute('data-task-id');
                    const answer = this.getAttribute('data-answer');

                    // Send AJAX request to submit the answer
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '/submit/answer');
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            alert('Answer submitted successfully!');

                            // Check if the answer is correct
                            if (isCorrect === '1') {
                                // Disable all answer buttons for this task
                                const taskAnswerButtons = document.querySelectorAll('.answer-button[data-task-id="' + taskId + '"]');
                                taskAnswerButtons.forEach(btn => {
                                    btn.disabled = true;
                                });
                                window.location.reload();
                            }
                            // Optionally, you can update UI based on the response
                        } else {
                            console.error('Failed to submit answer. Please try again.');
                        }
                    };
                    xhr.onerror = function() {
                        console.error('Failed to submit answer. Please try again.');
                    };
                    xhr.send(JSON.stringify({ task_id: taskId, answer: answer }));

                });
            });
        });
    </script>

    <script src="/js/ToggleAnswerVisibility.js"></script>

@endsection
