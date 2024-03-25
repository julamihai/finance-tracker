@extends('layout')

@section('title', 'Create Categories')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="max-w-md mx-auto">
        <form action="{{ route('categories.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Create Category</label>
                <input type="text" id="title" name="title" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Title" required />
            </div>

            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <div class="relative">
                <select id="type" name="type" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                    <option selected disabled>Alege</option>
                    @foreach($types as $type)
                        <option value="{{ $type }}">{{ strtoupper($type) }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293l-1.414 1.414L10 13.414l6.707-6.707-1.414-1.414L10 10.586z"/></svg>
                </div>
            </div>
            <button type="submit" id="category" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6 focus:outline-none focus:shadow-outline">Submit</button>
        </form>

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
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($categories as $category)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ strtoupper($category->type) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="text-blue-600 hover:underline">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('categories.destroy', ['id' => $category->id]) }}" class="text-red-600 hover:underline delete-category">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

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
                </tbody>
            </table>
        </div>
@endsection

