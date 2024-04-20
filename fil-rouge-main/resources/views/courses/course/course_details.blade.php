@extends('layouts.navbar')

@section('content')
<section class="bg-white dark:bg-gray-900 flex flex-col justify-between h-[35vh]" style="background-image: url('/storage/{{ $thisLesson->image->path }}'); background-size: cover; object-fit: cover; width: 100%;">
    <div>

    </div>

    <div class="flex flex-col sm:flex-row items-center justify-center bg-[rgba(21,27,39,0.85)] w-full p-1 sm:h-24 rounded">
        <!-- Main content -->
        <div class="flex flex-col mt-4 sm:mt-0 sm:ml-4">
            <h1 class="text-white font-bold text-2xl sm:text-3xl">{{$thisLesson->title}}</h1>
            <p class="text-lg font-bold text-gray-400">{{$thisLesson->description}}</p>
        </div>
    </div>


</section>

<section>
    <!-- Component -->
    <div class="bg-white mx-auto p-6">


        @foreach ($tasks as $task)
            <div class="mb-4">
                <div class="flex items-center justify-between bg-[#223654] pl-3 pr-2 py-3 w-full rounded text-gray-600 font-bold cursor-pointer">
                    <div class="flex gap-12">
                        <span class="text-[#ECBB0A]">Task {{ $loop->iteration }}</span>
                        <h1 class="text-white">{{ $task->title }}</h1>
                        @if ($task->is_complete)
                            <span class="text-green-500 ml-2">Completed</span>
                        @endif
                    </div>
                    <span class="h-6 w-6 flex items-center justify-center text-teal-500 toggleButton">
                        <span class="h-6 w-6 flex items-center justify-center text-teal-500">
                            <svg class="w-3 h-3 fill-current" viewBox="0 -192 469.33333 469" xmlns="http://www.w3.org/2000/svg">
                                <path d="m437.332031 192h-160v-160c0-17.664062-14.335937-32-32-32h-21.332031c-17.664062 0-32 14.335938-32 32v160h-160c-17.664062 0-32 14.335938-32 32v21.332031c0 17.664063 14.335938 32 32 32h160v160c0 17.664063 14.335938 32 32 32h21.332031c17.664063 0 32-14.335937 32-32v-160h160c17.664063 0 32-14.335937 32-32v-21.332031c0-17.664062-14.335937-32-32-32zm0 0" />
                            </svg>
                        </span>
                    </span>
                </div>
                <div class="flex flex-col hidden answer bg-gray-200 w-full border-l-4 border-red-500">
                    @if ($task->image)
                        <img src="{{ asset('storage/' . $task->image->path) }}" alt="{{ $task->title }}" class="mx-auto w-96 h-52 m-4">
                    @endif
                    <p class="text-gray-600 m-4">{{ $task->content }}</p>
                    <p class="text-gray-600 m-4">{{ $task->question }}</p>

                    <div>
                        <div class="flex items-center justify-center mt-4">
                            <div class="mx-8 text-[#A20606] text w-[25vw]"><span class="text-xl">Answer the questions below</span></div>
                            <div class="border-t-2 border-gray-400 w-full"></div>
                        </div>
                        <div class="flex flex-col gap-4 mt-8">
                            <p class="ml-8">{{ $task->question }}</p>
                            <ul class="flex flex-col gap-4 ml-16">
                                @foreach ($task->choices as $choice)
                                    @php
                                        $isCorrect = $choice->is_correct ? '1' : '0';
                                        $taskId = $task->id;
                                    @endphp

                                    <li>
                                        <button class="answer-button px-4 py-2 rounded-md focus:outline-none border-2 border-blue-500 shadow-md bg-white transition-colors duration-300"
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButtons = document.querySelectorAll('.toggleButton');
        const answerButtons = document.querySelectorAll('.answer-button');

        toggleButtons.forEach(toggleButton => {
            toggleButton.addEventListener('click', function() {
                const answer = this.parentElement.nextElementSibling;
                answer.classList.toggle('hidden');
                const svgIcon = this.querySelector('svg');
                if (!answer.classList.contains('hidden')) {
                    svgIcon.setAttribute('viewBox', '0 -192 469 469');
                    svgIcon.innerHTML = '<path d="m437.332031.167969h-405.332031c-17.664062 0-32 14.335937-32 32v21.332031c0 17.664062 14.335938 32 32 32h405.332031c17.664063 0 32-14.335938 32-32v-21.332031c0-17.664063-14.335937-32-32-32zm0 0"/>';
                } else {
                    svgIcon.setAttribute('viewBox', '0 0 469.33333 469.33333');
                    svgIcon.innerHTML = '<path d="m437.332031 192h-160v-160c0-17.664062-14.335937-32-32-32h-21.332031c-17.664062 0-32 14.335938-32 32v160h-160c-17.664062 0-32 14.335938-32 32v21.332031c0 17.664063 14.335938 32 32 32h160v160c0 17.664063 14.335938 32 32 32h21.332031c17.664063 0 32-14.335937 32-32v-160h160c17.664063 0 32-14.335937 32-32v-21.332031c0-17.664062-14.335937-32-32-32zm0 0"/>';
                }
            });
        });

        answerButtons.forEach(answerButton => {
            answerButton.addEventListener('click', function() {
                const currentButton = this;
                const dataIsCorrect = currentButton.getAttribute('data-is-correct');

                // Debug: Check data-is-correct attribute value
                console.log('data-is-correct:', dataIsCorrect);

                // Evaluate correctness based on the attribute value
                const isCorrect = dataIsCorrect === '1';

                // Debug: Check evaluated correctness
                console.log('isCorrect:', isCorrect);

                // Reset all buttons to default state
                answerButtons.forEach(button => {
                    button.classList.remove('border-green-500', 'border-red-500');
                });

                // Apply appropriate color class based on correctness
                if (isCorrect) {
                    currentButton.classList.add('border-green-500'); // Correct answer color
                } else {
                    currentButton.classList.add('border-red-500'); // Incorrect answer color
                }
            });
        });
    });
</script>

@endsection
