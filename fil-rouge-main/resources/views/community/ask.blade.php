@extends('layouts.header')

@section('community')

                <!-- Tweet Q -->
                <div class="bg-white mt-4 cursor-pointer transition duration-350 ease-in-out pb-4 border-l border-r">
                    <div class="flex flex-shrink-0 pb-0 border-2">
                        <a href="#" class="flex-shrink-0 group block">
                            <div class="flex items-top">
                                <div>
                                    <img class="inline-block h-10 w-10 m-2" src="storage/images/Group 31.png" alt="" />
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4 class="ml-4 text-2xl font-medium">Question for you</h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    @foreach($asks as $ask)
                        <div class="m-6">
                            <div class="mt-4 border-2 rounded-xl">
                                <p class="m-4">{{ $ask->content }}</p>
                                <button class="answerButton flex gap-2 m-4 p-2 rounded-full border-2 focus:outline-none"
                                        data-ask-id="{{ $ask->id }}">
                                    <img src="storage/images/Group 30.png" alt="" class="w-6 h-6">
                                    <h6 class="mr-2">Answer</h6>
                                </button>
                                <a href="{{ route('askanswers.index', ['ask_id' => $ask->id]) }}" class="underline text-blue-500 text-center">34 answers</a>
                                <p>{{ $ask->askanswer[0]->content ?? 'No answer yet' }}</p>                            </div>
                        </div>
                    @endforeach

                    <!-- Popup container -->
                    <div id="answerPopup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
                        <!-- Popup content -->
                        <div class="bg-white rounded-lg p-6 w-[50vw] h-[55vh]">
                            <h2 class="text-lg font-semibold mb-4">Answer</h2>
                            <!-- Answer form -->
                            <form id="answerForm" action="{{ route('askanswers.store') }}" method="POST">
                                @csrf
                                <input type="hidden" id="askIdInput" name="ask_id" value="">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <textarea name="content" class="w-full h-32 bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
                                          placeholder="Write your answer here..." required></textarea>
                                <!-- Submit button -->
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Submit</button>
                            </form>
                            <!-- Close button -->
                            <button id="closePopup" class="mt-4 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Close</button>
                        </div>
                    </div>
                </div>

                <!-- /Tweet -->


                <!-- Spinner -->
                <div class="flex items-center justify-center p-4 border-b border-l border-2 border-gray-200 bg-white">

                </div>
                <!-- /Spinner -->

            </div>
            <!-- /Middle -->

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const answerButtons = document.querySelectorAll('.answerButton');
            const answerPopup = document.getElementById('answerPopup');
            const askIdInput = document.getElementById('askIdInput');
            const closePopupButton = document.getElementById('closePopup');

            // Show popup when Answer button is clicked
            answerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const askId = this.dataset.askId;
                    askIdInput.value = askId; // Set the ask_id input value
                    answerPopup.classList.remove('hidden');
                });
            });

            // Hide popup when Close button is clicked
            closePopupButton.addEventListener('click', function() {
                answerPopup.classList.add('hidden');
            });
        });
    </script>



    <script>
        // Function to show the popup
        function showPopup() {
            document.getElementById('answerPopup').classList.remove('hidden');
        }

        // Function to hide the popup
        function hidePopup() {
            document.getElementById('answerPopup').classList.add('hidden');
        }

        // Event listener for the "Answer" button
        document.getElementById('answerButton').addEventListener('click', function() {
            showPopup();
        });

        // Event listener for the "Close" button
        document.getElementById('closePopup').addEventListener('click', function() {
            hidePopup();
        });
    </script>

@endsection
