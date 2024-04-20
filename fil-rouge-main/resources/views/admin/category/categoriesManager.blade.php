@extends('layouts.sidebar')

@section('content')
    <div>
        
        {{-- display category table  --}}
        <div class="mt-12">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Categories</h1>
                    <button id='openModel' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        onclick="openModal()">
                        + Add Category
                    </button>
                </div>

                <div class="bg-white shadow-md rounded">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-left">Image</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($categories as $category)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $category->name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $category->description }}</td>
                                    <td class="py-3 px-6 text-left">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image->path) }}"
                                                alt="{{ $category->name }}" class="h-10 w-auto">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center items-center">
                                            <!-- HTML -->

                                            <a href="#" class="text-blue-500 hover:text-blue-700 mr-2"
                                                onclick="openEditModal({{ $category->id }}, '{{ $category->name }}', '{{ $category->description }}')">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('categoriesManager.destroy', $category->id) }}" method="POST" class="inline-block">
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
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        {{-- add categorie popup  --}}
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal">
            <div class="fixed  inset-0 bg-gray-500 bg-opacity-75 z-[-1]"></div>
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg  p-6 max-w-md">
                    <h2 class="text-xl font-bold mb-4">Add Category</h2>
                    <!-- Add your form fields here -->
                    <form method="POST" action="{{ route('categoriesManager.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="name">
                                Category Name
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="name" name="name" type="text" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description" name="description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="image">
                                Category Image
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="image" name="image" type="file" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Add Category
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                onclick="closeModal()">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <!-- Edit Category Modal -->
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="editModal">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 z-[-1]"></div>
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg p-6 max-w-md">
                    <h2 class="text-xl font-bold mb-4">Edit Category</h2>
                    <form method="POST" action="{{ route('categoriesManager.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="category_id" id="editCategoryId">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="editName">
                                Category Name
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="editName" name="name" type="text" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="editDescription">
                                Description
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="editDescription" name="description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="editImage">
                                Category Image
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="editImage" name="image" type="file">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Update Category
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="closeEditModal()">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
    <script>
        function openEditModal(categoryId, name, description) {
            document.getElementById('editCategoryId').value = categoryId;
            document.getElementById('editName').value = name;
            document.getElementById('editDescription').value = description;
            document.getElementById('editModal').classList.remove('hidden');
        }
    
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>


@endsection
