@extends('layout')
@section('title', 'Edit Income')

@section('content')
    <div class="max-w-md mx-auto mt-8">
        <form action="{{ route('income.update', ['id' => $income->id]) }}" method="POST" class=" max-w-md bg-white shadow-md rounded mt-6 px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Income</label>
                <input type="text" id="title" name="title" value="{{ $income->title }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Title" required />
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                <input type="number" id="amount" name="amount" value="{{ $income->amount }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Amount" required />
            </div>

            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <div class="relative">
                <select id="category_id" name="category_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($income->category->id == $category->id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5.293 7.293l-1.414 1.414L10 13.414l6.707-6.707-1.414-1.414L10 10.586z"/></svg>
                </div>
            </div>
            <div class="flex justify-around">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">Submit</button>
                <button type="button" onclick="window.history.back()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">Go Back</button>
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
