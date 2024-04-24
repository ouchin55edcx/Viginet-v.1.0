@extends('layouts.sidebar')

@section('content')

    <!-- Statics -->
    <div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
        <div class="sm:flex sm:space-x-4">
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                <div class="bg-white p-5">
                    <div class="sm:flex sm:items-start">
                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                            <p class="text-3xl font-bold text-black">{{$ClientsCount}}</p>
                            <h3 class="text-sm leading-6 font-medium text-gray-400">Total Subscribers</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                <div class="bg-white p-5">
                    <div class="sm:flex sm:items-start">
                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                            <h3 class="text-sm leading-6 font-medium text-gray-400">Total Courses</h3>
                            <p class="text-3xl font-bold text-black">{{$LessonsCount}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                <div class="bg-white p-5">
                    <div class="sm:flex sm:items-start">
                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                            <h3 class="text-sm leading-6 font-medium text-gray-400">Total Categories</h3>
                            <p class="text-3xl font-bold text-black">{{$CategoriesCount}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
                <div class="bg-white p-5">
                    <div class="sm:flex sm:items-start">
                        <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                            <h3 class="text-sm leading-6 font-medium text-gray-400">Total Complaints</h3>
                            <p class="text-3xl font-bold text-black">{{$ComplaintsCount}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Statics -->


    <!-- user manager -->
    <div class="m-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <div class="bg-yellow-100 py-6 px-4 rounded-lg shadow-md text-center">
                        <h1 class="text-3xl font-bold text-gray-800">User Manager</h1>
                    </div>

                    <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            userName
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            email
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Created at
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$client->username}}                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap"> {{$client->email}}</p>
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$client->created_at}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                                    <span class="absolute inset-0 rounded-full"></span>
                                    <span class="relative" id="clientStatus{{ $client->client->id }}">
                                        {{ $client->client->status }}
                                    </span>
                                </span>
                                <button class="ml-2 px-2 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600"
                                        onclick="toggleClientStatus('{{ $client->client->id }}', '{{ $client->status }}')">
                                    Change Status
                                </button>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{ $clients->links() }}
            </div>
        </div>
    </div>


    <script>
        function toggleClientStatus(clientId, currentStatus) {
            var newStatus = (currentStatus === 'active') ? 'inactive' : 'active';

            fetch(`/clients/${clientId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            })
                .then(response => {
                    if (response.ok) {
                        // Parse the JSON response to get the updated status
                        return response.json();
                    } else {
                        throw new Error('Failed to toggle client status');
                    }
                })
                .then(data => {
                    // Update the status text in the table with the new status
                    document.getElementById('clientStatus' + clientId).textContent = data.status;
                })
                .catch(error => {
                    console.error('Error toggling client status:', error);
                });
        }

    </script>

    <!-- end user manager -->

@endsection
