@extends('layout')
@section('title', 'Account')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="max-w-md mx-auto mt-8 mb-8 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 shadow-lg">
        <div class="mb-4">
            <p class="block text-red-700 text-sm font-bold mb-2">UUID <br> (Save this so you can reset your password if you forget it!)</p>
            <p class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ Auth::user()->uuid }}</p>
        </div>
    </div>
    <!-- name, email -->
    <div class="max-w-md mx-auto mt-8">
        <form action="#" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 shadow-lg">
            <div class="mb-4 flex justify-between items-center">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <div class="flex space-x-4">
                    <input type="text" id="username" name="title" value="{{ Auth::user()->name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Username" required>
                    <a href="{{ route('change.username') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                </div>
            </div>

            <div class="mb-4 flex justify-between items-center">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                <div class="flex space-x-4">
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email Address" required>
                    <a href="{{ route('change.email') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                </div>
            </div>
        </form>

        <!-- Logout Button -->
        <div class="bg-white rounded-xl shadow-lg px-6 py-4 flex justify-between items-center">
            <form action="{{ route('logout') }}" method="GET" class="flex items-center space-x-4">
                @csrf
                <h3 class="text-lg font-semibold text-gray-800">Logout</h3>
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Logout</button>
            </form>
        </div>



        <!-- Change Password Section -->
        <div class="bg-white mt-8 rounded-xl px-4 py-4">
            <form action="{{ route('change.password') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700 text-sm font-bold mb-2">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Current Password" required>
                    @error('current_password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
                    <input type="password" id="password" name="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="New Password" required>
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm New Password" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Change Password</button>
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

        <!-- Delete Account Section -->
        <div class="mt-8 bg-white rounded-xl px-4 py-2 shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Delete Account</h2>
            <form action="{{route('account.delete')}}" method="POST">
                @csrf
                @method('DELETE')
                <p class="text-red-600">Warning: This action cannot be undone!</p>
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 focus:outline-none focus:shadow-outline">Delete Account</button>
            </form>
        </div>
    </div>
@endsection

