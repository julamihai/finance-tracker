<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

<!-- Header -->
<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-6 flex justify-between items-center">
        <!-- Logo -->
        <h1 class="text-2xl font-bold text-gray-800">Finance-Tracker</h1>

        <!-- Navigation Links -->
        <nav>
            <a href="{{ route('welcome') }}" class="text-gray-600 hover:text-gray-800 mx-4 transition-all duration-300">Home</a>
            <a href="#about" class="text-gray-600 hover:text-gray-800 mx-4 transition-all duration-300">About</a>
            <a href="#services" class="text-gray-600 hover:text-gray-800 mx-4 transition-all duration-300">Services</a>
            <a href="#contact" class="text-gray-600 hover:text-gray-800 mx-4 transition-all duration-300">Contact</a>
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 mx-4 transition-all duration-300">Account</a>
        </nav>
    </div>
</header>

<div class="container mx-auto py-8">
    @yield('content')
</div>
