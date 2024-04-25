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

            <svg
                class="h-8 w-8 fill-current text-blue-600 dark:text-blue-300"
                viewBox="0 0 24 24">
                <path
                    d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3m6.82
					6L12 12.72 5.18 9 12 5.28 18.82 9M17 16l-5 2.72L7 16v-3.73L12
					15l5-2.73V16z"></path>
            </svg>

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
                <a
                    href="#"
                    class=" flex flex-col items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                        <path
                            d="M21 18v1a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0
							012-2h14a2 2 0 012 2v1h-9a2 2 0 00-2 2v8a2 2 0 002
							2m0-2h10V8H12m4 5.5a1.5 1.5 0 01-1.5-1.5 1.5 1.5 0
							011.5-1.5 1.5 1.5 0 011.5 1.5 1.5 1.5 0 01-1.5 1.5z"></path>
                    </svg>
                    <span class="text-xs mt-2">earnings</span>
                </a>

            </li>

            <li
                class="mt-3 p-2 hover:text-blue-600 dark-hover:text-blue-300
				rounded-lg">
                <a href="#" class=" flex flex-col items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 512 512">
                        <path
                            d="M505 442.7L405.3
							343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7
							44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208
							208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7
							17l99.7 99.7c9.4 9.4 24.6 9.4 33.9
							0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7
							0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128
							57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                    </svg>
                    <span class="text-xs mt-2">jobs</span>
                </a>

            </li>

            <li
                class="mt-3 p-2 hover:text-blue-600 dark-hover:text-blue-300
				rounded-lg">
                <a href="#" class=" flex flex-col items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                        <path
                            d="M19 19H5V8h14m0-5h-1V1h-2v2H8V1H6v2H5a2 2 0 00-2
							2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2m-2.47
							8.06L15.47 10l-4.88 4.88-2.12-2.12-1.06 1.06L10.59
							17l5.94-5.94z"></path>
                    </svg>
                    <span class="text-xs mt-2">schedule</span>
                </a>

            </li>

            <li class="mt-3 p-2 hover:text-blue-600 rounded-lg">
                <a
                    href="#"
                    class=" flex flex-col items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                        <path
                            d="M17 10.5V7a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0
							001 1h12a1 1 0 001-1v-3.5l4 4v-11l-4 4z"></path>
                    </svg>
                    <span class="text-xs mt-2">lesson</span>
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
                                <img src="{{ asset($complaint['image'][0]['path']) }}" alt="Complaint Attachment" class="max-w-full h-auto">
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
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="bg-white w-[50vw] mx-auto shadow-md rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-800">Write Report</h2>
                    </div>
                    <div class="border-t border-gray-200">
                        <form action="{{ route('reports.store') }}" method="POST" class="px-6 py-4">
                            @csrf

                            <input type="hidden" name="complaint_id" value="{{ $complaint['id'] }}<">
                            <div class="mb-4">
                                <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
                                <textarea name="summary" id="summary" rows="2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="findings" class="block text-sm font-medium text-gray-700">Findings</label>
                                <textarea name="findings" id="findings" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="recommendations" class="block text-sm font-medium text-gray-700">Recommendations</label>
                                <textarea name="recommendations" id="recommendations" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit Report
                                </button>
                                <button type="button" id="closePopupBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Close
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
