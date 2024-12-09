@extends('layout')

@section('title', 'Account')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Account Page Container -->
    <div class="min-h-screen bg-gradient-to-r from-gray-800 via-gray-900 to-black text-white">

        <!-- Account Info Section -->
        <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

            <!-- UUID Display -->
            <div class="max-w-md mx-auto mt-8 bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-6">
                <p class="text-red-400 text-sm font-semibold mb-2">UUID (Save this to reset your password if forgotten)</p>
                <p class="border rounded w-full py-2 px-3 bg-gray-700 text-gray-300 text-center">{{ Auth::user()->uuid }}</p>
            </div>

            <!-- Username and Email Section -->
            <form action="#" method="POST" class="bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-6 space-y-6">

                <!-- Username Field -->
                <div class="flex justify-between items-center">
                    <label for="username" class="text-gray-300 text-sm font-semibold">Username</label>
                    <div class="flex items-center space-x-4">
                        <input type="text" id="username" name="username" value="{{ Auth::user()->name }}" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Username" required>
                        <a href="{{ route('change.username') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Edit</a>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="flex justify-between items-center">
                    <label for="email" class="text-gray-300 text-sm font-semibold">Email Address</label>
                    <div class="flex items-center space-x-4">
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Email Address" required>
                        <a href="{{ route('change.email') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Edit</a>
                    </div>
                </div>

            </form>

            <!-- Change Password Section -->
            <div class="bg-gray-800 mt-8 rounded-xl px-8 py-8 shadow-lg">
                <form action="{{ route('change.password') }}" method="POST">
                    @csrf

                    <!-- Current Password -->
                    <div class="mb-6">
                        <label for="current_password" class="block text-gray-300 text-sm font-semibold mb-2">Current Password</label>
                        <input type="password" id="current_password" name="current_password" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Current Password" required>
                        @error('current_password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-300 text-sm font-semibold mb-2">New Password</label>
                        <input type="password" id="password" name="password" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="New Password" required>
                        @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-300 text-sm font-semibold mb-2">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Confirm New Password" required>
                    </div>

                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">Change Password</button>
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

            <!-- Logout Button -->
            <div class="bg-gray-800 rounded-xl shadow-lg px-6 py-4 mt-8">
                <form action="{{ route('logout') }}" method="GET" class="flex items-center justify-between space-x-4">
                    @csrf
                    <h3 class="text-lg font-semibold text-gray-300">Logout</h3>
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Logout</button>
                </form>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-gray-800 mt-8 rounded-xl px-8 py-4 shadow-lg">
                <h2 class="text-lg font-semibold text-gray-300 mb-4">Delete Account</h2>
                <form action="{{ route('account.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="text-red-600 text-sm">Warning: This action cannot be undone!</p>
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mt-4 w-full focus:outline-none focus:ring-2 focus:ring-red-500">Delete Account</button>
                </form>
            </div>

        </div>
    </div>

@endsection



