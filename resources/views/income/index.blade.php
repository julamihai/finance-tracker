@extends('layout')

@section('title', 'Income Management')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Add Income Form -->
    <div class="max-w-4xl mx-auto p-8 bg-gradient-to-br from-gray-800 via-gray-700 to-gray-600 shadow-xl rounded-xl mt-8">
        <h1 class="text-3xl font-bold text-white text-center mb-6">Add New Income</h1>

        <form action="{{ route('income.store') }}" method="POST" class="space-y-8">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300">Income Title</label>
                    <input type="text" id="title" name="title"
                           class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-white bg-gray-700"
                           placeholder="E.g., Salary, Bonus" required />
                </div>
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-300">Amount</label>
                    <input type="number" id="amount" name="amount"
                           class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-white bg-gray-700"
                           placeholder="E.g., 1000, 2000" required />
                </div>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-300">Category</label>
                <select id="category_id" name="category_id"
                        class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 bg-gray-700 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                Add Income
            </button>
        </form>
    </div>

    <!-- Income List -->
    <div class="max-w-4xl mx-auto p-8 bg-gray-800 shadow-xl rounded-xl mt-12">
        <h2 class="text-2xl font-semibold text-white mb-4">Your Income</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-200">
                <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-gray-300 font-medium uppercase">Title</th>
                    <th class="px-6 py-3 text-gray-300 font-medium uppercase">Amount</th>
                    <th class="px-6 py-3 text-gray-300 font-medium uppercase">Category</th>
                    <th class="px-6 py-3 text-gray-300 font-medium uppercase text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($incomes as $income)
                    <tr class="border-b hover:bg-gray-700 transition">
                        <td class="px-6 py-4">{{ $income->title }}</td>
                        <td class="px-6 py-4">{{ number_format($income->amount, 2) }}</td>
                        <td class="px-6 py-4">{{ $income->category ? strtoupper($income->category->title) : 'No category' }}</td>
                        <td class="px-6 py-4 text-center space-x-4">
                            <a href="{{ route('income.edit', ['id' => $income->id]) }}"
                               class="text-indigo-400 hover:underline font-semibold">
                                Edit
                            </a>
                            <a href="{{ route('income.destroy', ['id' => $income->id]) }}"
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
                text: '{{ session('success')}}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if(session('notFound'))
        <script>
            Swal.fire({
                title: 'Ooops!',
                text: '{{ session('notFound')}}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection

