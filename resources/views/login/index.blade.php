@extends('welcomelayout')
@section('title', 'Login')

@section('content')

    <div class="min-h-screen bg-gradient-to-r from-gray-800 via-gray-900 to-black flex justify-center items-center">

        <!-- Login Form Container -->
        <div class="max-w-md w-full bg-gray-800 shadow-xl rounded-lg px-8 py-6">

            <!-- Title -->
            <h2 class="text-2xl text-center text-white font-bold mb-6">Login</h2>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-300 text-sm font-semibold mb-2">E-Mail Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Email" required autofocus>
                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-300 text-sm font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Password" required>
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit and Go Back Buttons -->
                <div class="flex items-center justify-between space-x-4">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Login
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" onclick="goBack()" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Go Back
                    </button>
                </div>

                <!-- Link to Registration Page -->
                <div class="mt-4 text-center">
                    <a href="{{ route('register.index') }}" class="text-sm text-blue-400 hover:text-blue-600 font-bold">
                        Don't have an account? Register here!
                    </a>
                </div>
            </form>

        </div>

    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection

