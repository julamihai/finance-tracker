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
<header class="bg-gray-700 text-white shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-8">
        <!-- Logo -->
        <a href="{{route('dashboard')}}" class="text-2xl font-bold">Finance-Tracker</a>

        <!-- Menu Toggle Button -->
        <label for="menu-toggle" class="cursor-pointer md:hidden">
            <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                      d="M3 9a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0-4a1 1 0 1 1 0-2h12a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0 8a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2H3z" />
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <!-- Navigation Links -->
        <nav class="hidden md:flex items-center space-x-6">
            <a class="hover:text-gray-300" href="{{route('dashboard')}}">Dashboard</a>
            <a class="hover:text-gray-300" href="{{route('categories.index')}}">Categories</a>
            <a class="hover:text-gray-300" href="{{route('income.index')}}">Income</a>
            <a class="hover:text-gray-300" href="{{route('expense.index')}}">Expenses</a>
            <a class="hover:text-gray-300" href="{{route('account')}}">Profile - {{Auth::user()->name ?? ''}}</a>


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

