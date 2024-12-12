@extends('welcomelayout')
@section('title', 'Reset Password')

@section('content')

    <div class="min-h-screen bg-gradient-to-r from-gray-800 via-gray-900 to-black flex justify-center items-center">

        <!-- Reset Password Form Container -->
        <div class="max-w-md w-full bg-gray-800 shadow-xl rounded-lg px-8 py-6">
            <h2 class="text-2xl text-center text-white font-bold mb-6">Reset Password</h2>
            <p class="text-gray-400 text-center mb-6">Enter your email, new password, and confirmation below to reset your account password.</p>
            <!-- Reset Password Form -->
            <form action="{{route('password.update')}}" method="POST">
                @csrf

                <!-- Hidden Token Field -->
                <input type="hidden" name="token" value="{{ $token }}">
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-300 text-sm font-semibold mb-2">E-Mail Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Email" required autofocus>
                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-300 text-sm font-semibold mb-2">New Password</label>
                    <input type="password" id="password" name="password" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="New Password" required>
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-300 text-sm font-semibold mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Confirm Password" required>
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between space-x-4">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Reset Password
                    </button>
                </div>

                <!-- Link to Login Page -->
                <div class="mt-4 text-center">
                    <a href="{{ route('login.index') }}" class="text-sm text-blue-400 hover:text-blue-600 font-bold">
                        Remembered your password? Login here!
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
