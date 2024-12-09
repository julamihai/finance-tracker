@extends('layout')

@section('title', 'Update Category')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Update Category Form -->
    <div class="max-w-4xl mx-auto p-8 bg-gradient-to-br from-gray-800 via-gray-700 to-gray-600 shadow-xl rounded-xl mt-8">
        <h1 class="text-3xl font-bold text-white text-center mb-6">Update Category</h1>

        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Category Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300">Category Title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ $category->title }}"
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
                        <option value="" disabled>Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ $type === $category->type ? 'selected' : '' }}>
                                {{ strtoupper($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-between items-center mt-6 space-x-4">
                <button
                    type="submit"
                    class="w-1/2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                    Update
                </button>
                <button
                    type="button"
                    onclick="window.history.back()"
                    class="w-1/2 bg-gradient-to-r from-red-600 to-red-400 text-white font-semibold py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                    Cancel
                </button>
            </div>
        </form>
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
@endsection

