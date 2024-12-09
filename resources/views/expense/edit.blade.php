@extends('layout')

@section('title', 'Edit Expense')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Edit Expense Form -->
    <div class="max-w-4xl mx-auto p-8 bg-gradient-to-br from-gray-800 via-gray-700 to-gray-600 shadow-xl rounded-xl mt-8">
        <h1 class="text-3xl font-bold text-white text-center mb-6">Edit Expense</h1>

        <form action="{{ route('expense.update', ['id' => $expense->id]) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Expense Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300">Expense Title</label>
                    <input type="text" id="title" name="title" value="{{ $expense->title }}"
                           class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-white bg-gray-700"
                           placeholder="E.g., Rent, Utilities" required />
                </div>

                <!-- Expense Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-300">Amount</label>
                    <input type="number" id="amount" name="amount" value="{{ $expense->amount }}"
                           class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-white bg-gray-700"
                           placeholder="E.g., 1000, 5000" required />
                </div>
            </div>

            <!-- Category Selection -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-300">Category</label>
                <select id="category_id" name="category_id"
                        class="block w-full mt-2 border border-gray-500 rounded-lg py-2 px-4 bg-gray-700 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($expense->category && $expense->category->id == $category->id) selected @endif>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-6 space-x-4">
                <button type="submit"
                        class="w-1/2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                    Submit
                </button>
                <button type="button"
                        onclick="window.history.back()"
                        class="w-1/2 bg-gradient-to-r from-red-600 to-red-400 text-white font-semibold py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                    Go Back
                </button>
            </div>
        </form>
    </div>

    <!-- Success Alert -->
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

