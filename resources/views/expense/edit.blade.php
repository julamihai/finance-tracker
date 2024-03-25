@extends('layout')
@section('title', 'Edit Income')

@section('content')
    <div class="max-w-md mx-auto">
        <form action="{{route('expense.update', ['id'=>$expense->id])}}" method="POST" class="max-w-md mx-auto bg-white shadow-md px-8 pt-6 pb-8 mb-4 rounded">
            @csrf
            @method('PUT')
            <div class="mb-5 mt-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Income</label>
                <input type="text" id="title" name="title" value="{{$expense->title}}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Title" required />
            </div>
            <div class="mb-5 mt-4">
                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                <input type="number" id="amount" name="amount" value="{{$expense->amount}}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Amount" required />
            </div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select id="category_id" name="category_id" value="{{$expense->category->id}}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($categories as $category)
                    <option @if($expense->category->id == $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <div class="flex justify-around">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6 focus:outline-none focus:shadow-outline">Submit</button>
                <button type="button" onclick="window.history.back()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-6 focus:outline-none focus:shadow-outline">Go Back</button>
            </div>
        </form>
    </div>
    @if(session('update'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('update') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
