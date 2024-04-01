@extends('layout')
@section('title', 'Edit Email')
@section('content')
    <form action="{{ route('new.email') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 shadow-lg">
        @csrf
        <div class="mb-4 flex justify-between items-center">
            <label for="old_email" class="block text-gray-700 text-sm font-bold mb-2">Old Email</label>
            <div class="flex space-x-4">
                <input type="text" id="old_email" name="old_email" value="{{ Auth::user()->email }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Old Email" required readonly>
            </div>
        </div>
        <div class="mb-4 flex justify-between items-center">
            <label for="new_email" class="block text-gray-700 text-sm font-bold mb-2">New Email</label>
            <div class="flex space-x-4">
                <input type="email" id="new_email" name="email" value="" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="New Email" required>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
            </div>
        </div>
    </form>
@endsection

