@extends('layouts.header')

@section('community')
    <!-- User Post -->

    @foreach($posts as $post)
        <!-- User Post -->
        <div class="border max-w-screen-md bg-white mt-6  p-4">
            <div class="flex items-center	justify-between">
                <div class="gap-3.5	flex items-center ">
                    <img src="storage/images/v56_47.png"
                         class="object-cover bg-yellow-500 rounded-full w-10 h-10"/>
                    <div class="flex flex-col">
                        <b class="mb-2 capitalize">{{$post->user->username}}</b>
                        <time datetime="06-08-21" class="text-gray-400 text-xs">06 August at 09.15 PM
                        </time>
                    </div>
                </div>
                <div class="bg-gray-100	rounded-full h-3.5 flex	items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                         width="34px" fill="#92929D">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path
                            d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </div>
            </div>
            <div class="whitespace-pre-wrap mt-7 font-bold"># Info</div>
            <div class="whitespace-pre-wrap mt-7 font-medium">{{$post->title}}</div>
            <div class="mt-4">
                <p>
                    {{$post->content}}
                </p>
            </div>


            <div class="mt-5 flex gap-2	 justify-center border-b pb-4 flex-wrap	">
                <img src="storage/{{$post->image->path}}"
                     class="bg-red-500 rounded-2xl w-1/3 object-cover h-96 flex-auto" alt="photo">
            </div>

            <div class=" h-16 border-b  flex items-center justify-around	">
                <div class="flex items-center	gap-3	">
                    <svg width="20px" height="19px" viewBox="0 0 20 19" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="?-Social-Media" stroke="none" stroke-width="1" fill="none"
                           fill-rule="evenodd">
                            <g id="Square_Timeline" transform="translate(-312.000000, -746.000000)">
                                <g id="Post-1" transform="translate(280.000000, 227.000000)">
                                    <g id="Post-Action" transform="translate(0.000000, 495.000000)">
                                        <g transform="translate(30.000000, 21.000000)" id="Comment">
                                            <g>
                                                <g id="ic_comment-Component/icon/ic_comment">
                                                    <g id="Comments">
                                                        <polygon id="Path" points="0 0 24 0 24 25 0 25">
                                                        </polygon>
                                                        <g id="iconspace_Chat-3_25px"
                                                           transform="translate(2.000000, 3.000000)"
                                                           fill="#92929D">
                                                            <path
                                                                d="M10.5139395,15.2840977 L6.06545155,18.6848361 C5.05870104,19.4544672 3.61004168,18.735539 3.60795568,17.4701239 L3.60413773,15.1540669 C1.53288019,14.6559967 0,12.7858138 0,10.5640427 L0,4.72005508 C0,2.11409332 2.10603901,0 4.70588235,0 L15.2941176,0 C17.893961,0 20,2.11409332 20,4.72005508 L20,10.5640427 C20,13.1700044 17.893961,15.2840977 15.2941176,15.2840977 L10.5139395,15.2840977 Z M5.60638935,16.5183044 L9.56815664,13.4896497 C9.74255213,13.3563295 9.955971,13.2840977 10.1754888,13.2840977 L15.2941176,13.2840977 C16.7876789,13.2840977 18,12.0671403 18,10.5640427 L18,4.72005508 C18,3.21695746 16.7876789,2 15.2941176,2 L4.70588235,2 C3.21232108,2 2,3.21695746 2,4.72005508 L2,10.5640427 C2,12.0388485 3.1690612,13.2429664 4.6301335,13.28306 C5.17089106,13.297899 5.60180952,13.7400748 5.60270128,14.2810352 L5.60638935,16.5183044 Z"
                                                                id="Path"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <div class="text-sm	">10 Comments</div>
                </div>
                <div class="flex items-center gap-3">
                    <button id="likeButton{{ $post->id }}" class="text-red-500" onclick="toggleLike({{ $post->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="text-sm" id="likesCount{{ $post->id }}">{{ $post->likedByClients->count() }} Likes</div>
                </div>

                <div class="flex items-center	gap-3">
                    <svg width="17px" height="22px" viewBox="0 0 17 22" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="?-Social-Media" stroke="none" stroke-width="1" fill="none"
                           fill-rule="evenodd">
                            <g id="Square_Timeline" transform="translate(-787.000000, -745.000000)">
                                <g id="Post-1" transform="translate(280.000000, 227.000000)">
                                    <g id="Post-Action" transform="translate(0.000000, 495.000000)">
                                        <g transform="translate(30.000000, 21.000000)" id="Saved">
                                            <g transform="translate(473.000000, 1.000000)">
                                                <g id="ic_Saved-Component/icon/ic_Saved">
                                                    <g id="Saved">
                                                        <circle id="Oval" cx="12" cy="12"
                                                                r="12"></circle>
                                                        <g id="Group-13-Copy"
                                                           transform="translate(5.000000, 2.000000)"
                                                           fill="#92929D">
                                                            <path
                                                                d="M2.85714286,-0.952380952 L12.1428571,-0.952380952 C14.246799,-0.952380952 15.952381,0.753200953 15.952381,2.85714286 L15.952381,18.2119141 C15.952381,19.263885 15.09959,20.116746 14.047619,20.116746 C13.6150601,20.116746 13.1953831,19.9694461 12.8576286,19.6992071 L7.5,15.4125421 L2.14237143,19.6992071 C1.32096217,20.3564207 0.122301512,20.2233138 -0.534912082,19.4019046 C-0.805151112,19.0641501 -0.952380952,18.644473 -0.952380952,18.2119141 L-0.952380952,2.85714286 C-0.952380952,0.753200953 0.753200953,-0.952380952 2.85714286,-0.952380952 Z M2.85714286,0.952380952 C1.80517191,0.952380952 0.952380952,1.80517191 0.952380952,2.85714286 L0.952380952,18.2119141 L6.31000952,13.9252491 C7.00569973,13.3686239 7.99430027,13.3686239 8.68999048,13.9252491 L14.047619,18.2119141 L14.047619,2.85714286 C14.047619,1.80517191 13.1948281,0.952380952 12.1428571,0.952380952 L2.85714286,0.952380952 Z"
                                                                id="Rectangle-92"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <div class="flex items-center gap-3">
                        @if(! in_array(auth()->id() ,$post->savedByUsers()->pluck("user_id")->toArray()))
                            <button id="saveButton{{ $post->id }}" class="text-blue-500"
                                    onclick="toggleSave({{ $post->id }})">
                                Save
                            </button>
                        @else
                            <button id="saveButton{{ $post->id }}" class="text-blue-500"
                                    onclick="toggleSave({{ $post->id }})">
                                UnSave
                            </button>
                        @endif
                        <div class="savedMessage text-sm hidden">Saved</div>
                    </div>

                    <script>
                        function toggleSave(postId) {
                            const saveButton = document.getElementById('saveButton' + postId);
                            const savedMessage = document.querySelector('.savedMessage');

                            fetch(`/posts/${postId}/save`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                },
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.message.includes('saved')) {
                                        saveButton.textContent = 'Unsave';
                                        savedMessage.classList.remove('hidden');
                                    } else {
                                        saveButton.textContent = 'Save';
                                        savedMessage.classList.add('hidden');
                                    }
                                })
                                .catch(error => console.error(error));
                        }
                    </script>
                </div>
            </div>
            <!-- Assuming you have a parent container (e.g., a <div>) to wrap the comments -->
            <div class="mt-4">
                @foreach ($post->comments as $comment)
                    <div class="bg-white p-4 mb-4 rounded-lg shadow-md">
                        <p class="text-gray-700">{{ $comment->content }}</p>
                        <div class="flex items-center justify-between mt-2 text-sm text-gray-500">
                            <span>Posted by: {{ $comment->user->username }}</span>
                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-between gap-4 mt-4">
                <form action="{{ route('comments.store', ['postId' => $post->id]) }}" method="POST">
                    @csrf
                    <div class="flex items-center justify-between gap-4 mt-4">
                        <img
                            src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                            class="bg-yellow-500 rounded-full w-10 h-10 object-cover border"
                            alt="User Image">
                        <div class="w-full">
                            <input type="text"
                                   class="text-black placeholder-gray-500 border-2 border-gray-300 p-2 bg-gray-100 w-full rounded-full"
                                   name="content" id="content" required
                                   placeholder="Add a comment...">
                        </div>
                        <button type="submit"
                                class="ml-4 bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-full">
                            Send
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endforeach
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
        // Burger menus
        document.addEventListener('DOMContentLoaded', function () {
            // open
            const burger = document.querySelectorAll('.navbar-burger');
            const menu = document.querySelectorAll('.navbar-menu');

            if (burger.length && menu.length) {
                for (var i = 0; i < burger.length; i++) {
                    burger[i].addEventListener('click', function () {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            // close
            const close = document.querySelectorAll('.navbar-close');
            const backdrop = document.querySelectorAll('.navbar-backdrop');

            if (close.length) {
                for (var i = 0; i < close.length; i++) {
                    close[i].addEventListener('click', function () {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            if (backdrop.length) {
                for (var i = 0; i < backdrop.length; i++) {
                    backdrop[i].addEventListener('click', function () {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }
        });
    </script>

    {{--    like --}}
    <script>
        function toggleLike(postId) {
            const likeButton = document.getElementById('likeButton' + postId);
            const likesCountElement = document.getElementById('likesCount' + postId);

            fetch(`/posts/${postId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
                .then(response => response.json())
                .then(data => {
                    likeButton.classList.toggle('text-red-500');
                    likesCountElement.textContent = `${data.likes_count} Likes`;
                })
                .catch(error => console.error(error));
        }
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
        document.getElementById('answerButton').addEventListener('click', function () {
            showPopup();
        });

        // Event listener for the "Close" button
        document.getElementById('closePopup').addEventListener('click', function () {
            hidePopup();
        });
    </script>
@endsection
