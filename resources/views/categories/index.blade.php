@extends('layout')

@section('title', 'Category Management')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Add Category Form -->
    <div class="max-w-4xl mx-auto p-8 bg-gradient-to-br from-gray-800 via-gray-700 to-gray-600 shadow-xl rounded-xl mt-8">
        <h1 class="text-3xl font-bold text-white text-center mb-6">Add New Category</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-8">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Category Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300">Category Title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-white bg-gray-700"
                        placeholder="Enter category title"
                        required />
                </div>

                <!-- Category Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-300">Category Type</label>
                    <select
                        id="type"
                        name="type"
                        class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 bg-gray-700 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option selected disabled>Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ strtoupper($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                Add Category
            </button>
        </form>
    </div>

    <!-- Categories List -->
    <div class="max-w-4xl mx-auto p-8 bg-gray-800 shadow-xl rounded-xl mt-12">
        <h2 class="text-2xl font-semibold text-white mb-4">Your Categories</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-200">
                <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-gray-300 font-medium uppercase">Title</th>
                    <th class="px-6 py-3 text-gray-300 font-medium uppercase">Type</th>
                    <th class="px-6 py-3 text-gray-300 font-medium uppercase text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="border-b hover:bg-gray-700 transition">
                        <td class="px-6 py-4">{{ $category->title }}</td>
                        <td class="px-6 py-4">{{ strtoupper($category->type) }}</td>
                        <td class="px-6 py-4 text-center space-x-4">
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                               class="text-indigo-400 hover:underline font-semibold">
                                Edit
                            </a>
                            <a href="{{ route('categories.destroy', ['id' => $category->id]) }}"
                               class="text-red-400 hover:underline font-semibold">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({
                title: 'Ooops!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection


