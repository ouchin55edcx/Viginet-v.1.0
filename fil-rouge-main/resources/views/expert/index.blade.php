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

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @method('POST')
                <button type="submit" >
                    <svg class="fill-current h-5 w-5 mr-2" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z"/>
                    </svg>
                </button>
            </form>

        </div>

    </nav>
    <main
        class="my-1 pt-2 pb-2 px-10 flex-1 bg-gray-200 dark:bg-black rounded-l-lg
		transition duration-500 ease-in-out overflow-y-auto">

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4 ">
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">{{$ComplaintsCount}}</p>
                    <p>Complaint</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">557</p>
                    <p>Orders</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">$11,257</p>
                    <p>Sales</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">$75,257</p>
                    <p>Balances</p>
                </div>
            </div>
        </div>
        <!-- ./Statistics Cards -->

        <div class="flex">
            <div
                class="mr-6 w-full mt-8 py-2 flex-shrink-0 flex flex-col bg-white
				dark:bg-gray-600 rounded-lg">
                <!-- Card list container -->

                <h3
                    class="flex items-center pt-1 pb-1 px-8 text-lg font-semibold
					capitalize dark:text-gray-300">
                    <!-- Header -->
                    <span>Dodays Complaint</span>
                    <button class="ml-2">
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 256 512">
                            <path
                                d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9
								0l-22.6-22.6c-9.4-9.4-9.4-24.6
								0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6
								0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136
								136c9.5 9.4 9.5 24.6.1 34z"></path>
                        </svg>
                    </button>
                </h3>

                <div>
                    <!-- List -->
                    @foreach($aprovetComplaints as $complaint)
                        <ul class="w-full pt-1 pb-2 px-3 overflow-y-auto">
                            <li class="mt-2">
                                <a
                                    class="p-5 flex flex-col justify-between
                                    bg-gray-100 dark:bg-gray-200 rounded-lg"
                                    href="#">

                                    <div
                                        class="flex items-center justify-between
                                        font-semibold capitalize dark:text-gray-700">
                                        <!-- Top section -->

                                        <span>{{$complaint->attack}}</span>

                                        <div class="flex items-center">
                                            <a href="{{route('aproveComplainte', ['id' => $complaint->id])}}">
                                                <svg
                                                    class="h-5 w-5 fill-current mr-1
                                                text-gray-600"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M14 12l-4-4v3H2v2h8v3m12-4a10
                                                    10 0 01-19.54 3h2.13a8 8 0
                                                    100-6H2.46A10 10 0 0122 12z"></path>
                                                </svg>
                                            </a>
                                        </div>

                                    </div>
                                    <p
                                        class="text-sm font-medium leading-snug
                                        text-gray-600 my-3">
                                        <!-- Middle section -->
                                        <span>{{ Illuminate\Support\Str::limit($complaint->description, 5) }}</span>
                                    </p>
                                    <div class="flex justify-between">
                                        <!-- Bottom section -->
                                        <div class="flex">
                                            @if ($complaint->is_nonymous == 1)
                                                <p class="text-lg font-bold">Anonymous</p>
                                            @else
                                                <p class="text-lg font-bold">{{ optional($complaint->user)->username }}</p>
                                            @endif
                                        </div>
                                        <p
                                            class="text-sm font-medium leading-snug
                                            text-gray-600">
                                            {{ $complaint->created_at->diffForHumans() }}
                                        </p>
                                    </div>

                                </a>
                            </li>
                        </ul>
                    @endforeach

                    <a
                        href="#"
                        class="flex justify-center capitalize text-blue-500
						dark:text-blue-200">
                        <span>see all</span>
                    </a>

                </div>

            </div>

        </div>

    </main>

    <aside
        class="w-1/4 my-1 mr-1 px-6 py-4 flex flex-col bg-gray-200 dark:bg-black
		dark:text-gray-400 rounded-r-lg overflow-y-auto">
        <!-- Right side NavBar -->

        <div class="flex items-center justify-between">
            <!-- Info -->

            <a href="#" class="relative">
                <!-- Left side -->

                <span>
					<svg
                        class="h-5 w-5 hover:text-red-600 dark-hover:text-red-400"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
						<path
                            d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
						<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
					</svg>
				</span>

                <div class="absolute w-2 h-2 left-0 mb-6 ml-2 bottom-0">
					<span
                        class="px-2 py-1 bg-red-600 rounded-full text-white
						text-xs">
						{{$count}}
					</span>
                </div>

            </a>

            <div class="flex items-center">
                <!-- Right side -->

                <span style="font-weight: bold; font-size: 2rem;">{{ auth()->user()->username }}</span>
            </div>

        </div>

        <span class="mt-4 text-gray-600">Scrore</span>
        <span class="mt-1 text-3xl font-semibold">120 point</span>


        <div class="mt-12 flex items-center">
            <!-- New Complaint -->

            <span>New Complaint</span>
            <button class="ml-2 focus:outline-none">
                <svg class="h-5 w-5 fill-current" viewBox="0 0 256 512">
                    <path
                        d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9
						0l-22.6-22.6c-9.4-9.4-9.4-24.6
						0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3
						103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1
						34z"></path>
                </svg>
            </button>
        </div>

        @foreach ($complaints as $complaint)
            <div class="card bg-green-200 rounded-lg p-4 mb-4">
                @if ($complaint->is_nonymous == 1)
                    <p class="text-lg font-bold">Anonymous</p>
                @else
                    <p class="text-lg font-bold">{{ optional($complaint->user)->username }}</p>
                @endif

                <p class="text-sm">Type: {{ $complaint->attack }}</p>
                <p class="text-sm">Created At: {{ $complaint->created_at }}</p>
                <button class="approve-button bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mt-2" data-id="{{ $complaint->id }}">Approve</button>
            </div>
        @endforeach


        <div class="mt-4 flex justify-center capitalize text-blue-600">
            <a href="#">see all</a>
        </div>

    </aside>

</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const approveButtons = document.querySelectorAll('.approve-button');

        approveButtons.forEach(button => {
            button.addEventListener('click', async () => {
                const complaintId = button.dataset.id;

                try {
                    const response = await fetch('/expert/approve', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ complaint_id: complaintId })
                    });

                    if (response.ok) {
                        // Reload the page after successful approval
                        window.location.reload();
                    } else {
                        // Handle non-OK responses
                        throw new Error('Network response was not ok.');
                    }
                } catch (error) {
                    console.error('Error:', error.message);
                }
            });
        });
    });
</script>
