@extends('layout')
@section('title', 'Edit Username')
@section('content')

    <div class="min-h-screen bg-gradient-to-r from-gray-800 via-gray-900 to-black flex justify-center items-center">

        <div class="max-w-md w-full bg-gray-800 shadow-xl rounded-lg px-8 py-6">

            <h2 class="text-2xl text-center text-white font-bold mb-6">Edit Username</h2>

            <form action="{{ route('new.username') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-6">
                    <label for="old_username" class="block text-gray-300 text-sm font-semibold mb-2">Old Username</label>
                    <input type="text" id="old_username" name="old_username" value="{{ Auth::user()->name }}" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Old Username" required readonly>
                </div>

                <div class="mb-6">
                    <label for="new_username" class="block text-gray-300 text-sm font-semibold mb-2">New Username</label>
                    <input type="text" id="new_username" name="new_username" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="New Username" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Save
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection



