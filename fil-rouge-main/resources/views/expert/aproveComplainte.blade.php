<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<!-- component -->
<div class="h-screen w-full flex overflow-hidden select-none">
    <nav class="w-24 flex flex-col items-center bg-white dark:bg-gray-800 py-4">
        <!-- Left side NavBar -->

        <div>
            <!-- App Logo -->

<a>            <img src="/storage/images/logo.png" alt="viginet" class="w-8 h-8">
</a>
        </div>

        <ul class="mt-2 text-gray-700 dark:text-gray-400 capitalize">
            <!-- Links -->

            <li class="mt-3 p-2 text-blue-600 dark:text-blue-300 rounded-lg">
                <a href="#" class=" flex flex-col items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9
							17v2H5v-2h4M21 3h-8v6h8V3M11 3H3v10h8V3m10
							8h-8v10h8V11m-10 4H3v6h8v-6z"></path>
                    </svg>
                    <span class="text-xs mt-2">dashBoard</span>
                </a>

            </li>

            <li
                class="mt-3 p-2 hover:text-blue-600 dark-hover:text-blue-300
				rounded-lg">
                <a href="#" class=" flex flex-col items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3v-.5a2.5 2.5 0 00-5 0V3c-.55 0-1 .45-1 1v4c0
							.55.45 1 1 1h5c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1
							0h-3v-.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5V3M6
							11h9v2H6v-2m0-4h9v2H6V7m16 4v5c0 1.11-.89 2-2 2H6l-4
							4V4a2 2 0 012-2h11v2H4v13.17L5.17 16H20v-5h2z"></path>
                    </svg>
                    <span class="text-xs mt-2">messages</span>
                </a>

            </li>

            <li
                class="mt-3 p-2 hover:text-blue-600 dark-hover:text-blue-300
				rounded-lg">
                <a href="#" class=" flex flex-col items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3v-.5a2.5 2.5 0 00-5 0V3c-.55 0-1 .45-1 1v4c0
							.55.45 1 1 1h5c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1m-1
							0h-3v-.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5V3M6
							11h9v2H6v-2m0-4h9v2H6V7m16 4v5c0 1.11-.89 2-2 2H6l-4
							4V4a2 2 0 012-2h11v2H4v13.17L5.17 16H20v-5h2z"></path>
                    </svg>
                    <span class="text-xs mt-2">tools</span>
                </a>

            </li>

        </ul>

        <div
            class="mt-auto flex items-center p-2 text-blue-700 bg-purple-200
			dark:text-blue-500 rounded-full">
            <!-- important action -->

            <a href="#">
                <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                    <path
                        d="M12 1c-5 0-9 4-9 9v7a3 3 0 003 3h3v-8H5v-2a7 7 0 017-7
						7 7 0 017 7v2h-4v8h4v1h-7v2h6a3 3 0
						003-3V10c0-5-4.03-9-9-9z"></path>
                </svg>
            </a>

        </div>

    </nav>

    <main
        class="my-1 pt-2 pb-2 px-10 flex-1 bg-gray-200 dark:bg-black rounded-l-lg
		transition duration-500 ease-in-out overflow-y-auto">

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Complaint Details</h2>
                        <p class="text-sm text-gray-600">ID: {{ $complaint['id'] ?? 'N/A' }}</p>
                    </div>
                    <div class="text-gray-600">
                        @isset($complaint['status'])
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $complaint['status'] === 'approved' ? 'green-100 text-green-800' : 'red-100 text-red-800' }}">
                        {{ $complaint['status'] }}
                    </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-200 text-gray-600">
                        Status Unknown
                    </span>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    @isset($complaint['attack'])
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Attack Type</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['attack'] }}</dd>
                        </div>
                    @endisset

                    @isset($complaint['description'])
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Description</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['description'] }}</dd>
                        </div>
                    @endisset

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Anonymous</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['is_nonymous'] ? 'Yes' : 'No' }}</dd>
                    </div>

                    @isset($complaint['callback'])
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Callback</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['callback'] }}</dd>
                        </div>
                    @endisset

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">User</dt>
                        @isset($complaint['user'])
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['user']['username'] }} ({{ $complaint['user']['email'] }})</dd>
                        @else
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">User Not Available</dd>
                        @endisset
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Expert</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['expert_id'] ?? 'N/A' }}</dd>
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['created_at'] ?? 'N/A' }}</dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Updated At</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $complaint['updated_at'] ?? 'N/A' }}</dd>
                    </div>

                    @if (!empty($complaint['image']))
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Attachment</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                @if (isset($complaint['image'][0]['path']))
                                    <img src="{{ asset('storage/' . $complaint['image'][0]['path']) }}" alt="Complaint Attachment" class="max-w-full h-auto">
                                @else
                                    <p>No attachment available</p>
                                @endif
                            </dd>
                        </div>
                    @endif
                </dl>
            </div>
            <div class="px-6 py-4 flex justify-between">
                <button id="openPopupBtn" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Write Report
                </button>
            </div>
        </div>
        <!-- Popup -->
        <div id="popup" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="bg-white w-full max-w-md mx-auto shadow-lg rounded-lg overflow-hidden relative">
                    <!-- Modal Header -->
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Write Report</h2>
                        <button type="button" id="closePopupBtn" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover:bg-gray-200 rounded-full p-1 absolute top-4 right-4">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal Content -->
                    <div class="px-6 py-4">
                        <form action="{{ route('reports.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="complaint_id" value="{{ $complaint['id'] }}">
                            <div class="flex flex-col">
                                <label for="summary" class="text-sm font-medium text-gray-700 mb-1">Summary</label>
                                <textarea name="summary" id="summary" rows="2" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label for="findings" class="text-sm font-medium text-gray-700 mb-1">Findings</label>
                                <textarea name="findings" id="findings" rows="4" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label for="recommendations" class="text-sm font-medium text-gray-700 mb-1">Recommendations</label>
                                <textarea name="recommendations" id="recommendations" rows="3" class="rounded-md border border-gray-300 p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md bg-indigo-600 text-white font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit Report
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const openPopupBtn = document.getElementById('openPopupBtn');
            const popup = document.getElementById('popup');
            const closePopupBtn = document.getElementById('closePopupBtn');

            openPopupBtn.addEventListener('click', () => {
                popup.classList.remove('hidden');
            });

            closePopupBtn.addEventListener('click', () => {
                popup.classList.add('hidden');
            });
        </script>
    </main>

</div>
