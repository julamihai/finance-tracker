@extends('layout')

@section('title', 'Income')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="max-w-md mx-auto ">
        <form action="{{ route('income.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Income</label>
                <input type="text" id="title" name="title" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Title" required />
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                <input type="number" id="amount" name="amount" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Amount" required />
            </div>

            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <div class="relative">
                <select id="category_id" name="category_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                    <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293l-1.414 1.414L10 13.414l6.707-6.707-1.414-1.414L10 10.586z"/></svg>
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

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6 focus:outline-none focus:shadow-outline">Submit</button>
        </form>
    </div>

    <div class="flex items-center justify-center mt-4">
        <div class="bg-white rounded-md overflow-hidden w-full">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($incomes as $income)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $income->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $income->amount }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $income->category ? strtoupper($income->category->title) : 'No category' }}</td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('income.edit', ['id' => $income->id]) }}" class="text-green-600 hover:underline">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('income.destroy', ['id' => $income->id]) }}" class="text-red-600 hover:underline">
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
    </div>

@endsection
