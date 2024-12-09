@extends('layout')
@section('title', 'Edit Email')
@section('content')

    <div class="min-h-screen bg-gradient-to-r from-gray-800 via-gray-900 to-black flex justify-center items-center">

        <div class="max-w-md w-full bg-gray-800 shadow-xl rounded-lg px-8 py-6">

            <h2 class="text-2xl text-center text-white font-bold mb-6">Edit Email</h2>

            <form action="{{ route('new.email') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="old_email" class="block text-gray-300 text-sm font-semibold mb-2">Old Email</label>
                    <input type="text" id="old_email" name="old_email" value="{{ Auth::user()->email }}" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Old Email" required readonly>
                </div>

                <div class="mb-6">
                    <label for="new_email" class="block text-gray-300 text-sm font-semibold mb-2">New Email</label>
                    <input type="email" id="new_email" name="email" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="New Email" required>
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


