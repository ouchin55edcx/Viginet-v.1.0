@extends('layouts.header')

@section('community')

    <div class="container mx-auto py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold mb-8">Answers for the Question</h1>

            @foreach($askanswer as $ask)
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 mr-4">
                            <!-- Display user avatar (assuming user relationship exists on Ask model) -->
                            <img src="storage/images/Group 31.png" alt="User Avatar" class="rounded-full w-12 h-12">
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold">{{ $ask->content }}</h2>
                            <p class="text-sm text-gray-600">Asked by {{ $ask->user->username }} on {{ $ask->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold mb-4">Answers:</h3>

                    @foreach($ask->askanswer as $answer)
                        <div class="bg-gray-100 rounded-lg p-4 mb-4">
                            <p class="text-gray-800">{{ $answer->content }}</p>
                            <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                                <!-- Display username of the answer's author -->
                                <span>Answered by: {{ $answer->user->username }}</span>
                                <!-- Display relative timestamp using diffForHumans() -->
                                <span>{{ $answer->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection
