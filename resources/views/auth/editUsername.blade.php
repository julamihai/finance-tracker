@extends('layout')
@section('title', 'Edit Username')
@section('content')
    <form action="{{ route('new.username') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 shadow-lg">
        @csrf
        @method('POST')
        <div class="mb-4 flex justify-between items-center">
            <label for="old_username" class="block text-gray-700 text-sm font-bold mb-2">Old Username</label>
            <div class="flex space-x-4">
                <input type="text" id="old_username" name="old_username" value="{{ Auth::user()->name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Old Username" required readonly>
            </div>
        </div>
        <div class="mb-4 flex justify-between items-center">
            <label for="new_username" class="block text-gray-700 text-sm font-bold mb-2">New Username</label>
            <div class="flex space-x-4">
                <input type="text" id="new_username" name="new_username" value="" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="New Username" required>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
            </div>
        </div>
    </form>
@endsection


