@extends('welcomelayout')
@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center mt-8">
        <div class="max-w-md w-full bg-white shadow-md rounded px-8 py-6">
            <h2 class="text-2xl text-center font-bold mb-6">Login</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-Mail Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email" required autofocus>
                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Password" required>
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                    <button type="submit" onclick="goBack()" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Go back</button>
                    <a href="{{ route('register.index') }}" class="text-sm font-bold text-blue-500 hover:text-blue-800">Don't have an account?</a>
                </div>
                <script>
                    function goBack(){
                        window.history.back();
                    }
                </script>
            </form>
        </div>
    </div>
@endsection
