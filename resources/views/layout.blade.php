<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Finance-Tracker')</title>
    <!-- Add Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

<!-- Header -->
<header class="bg-gradient-to-r from-gray-800 via-gray-900 to-black shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <h1  class="text-3xl font-extrabold text-gray-200 tracking-wide border-b-2 border-gray-600 pb-1 hover:text-white transition duration-300">
            <a href="{{route('dashboard')}}">Finance-Tracker</a>
        </h1>

        <!-- Navigation Links -->
        <nav class="hidden md:flex items-center space-x-6">
            <a class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300" href="{{route('dashboard')}}">Dashboard</a>
            <a class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300" href="{{route('categories.index')}}">Categories</a>
            <a class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300" href="{{route('income.index')}}">Income</a>
            <a class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300" href="{{route('expense.index')}}">Expenses</a>
            <a class="flex items-center space-x-3 text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300" href="{{route('account')}}">
                <!-- User Name -->
                <span>{{ Auth::user()->name ?? 'Guest' }}</span>
                <!-- User Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>

        </nav>

        <!-- Menu Toggle Button for mobile -->
        <label for="menu-toggle" class="cursor-pointer md:hidden">
            <svg class="h-6 w-6 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                      d="M3 9a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0-4a1 1 0 1 1 0-2h12a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0 8a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2H3z" />
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <!-- Responsive Navigation Links for mobile -->
        <nav id="menu" class="hidden md:hidden w-full bg-gray-800 text-white absolute top-0 left-0 py-8 px-4">
            <a href="{{route('dashboard')}}" class="block text-lg py-2 hover:text-gray-300">Dashboard</a>
            <a href="{{route('categories.index')}}" class="block text-lg py-2 hover:text-gray-300">Categories</a>
            <a href="{{route('income.index')}}" class="block text-lg py-2 hover:text-gray-300">Income</a>
            <a href="{{route('expense.index')}}" class="block text-lg py-2 hover:text-gray-300">Expenses</a>
            <a href="{{route('account')}}" class="block text-lg py-2 hover:text-gray-300">Profile - {{Auth::user()->name ?? ''}}</a>
        </nav>
    </div>
</header>

<!-- Content -->
<div class="container mx-auto py-8">
    @yield('content')
</div>

<script>
    document.getElementById('menu-toggle').addEventListener('change', function () {
        if (this.checked) {
            document.getElementById('menu').classList.remove('hidden');
        } else {
            document.getElementById('menu').classList.add('hidden');
        }
    });
</script>

</body>
</html>


