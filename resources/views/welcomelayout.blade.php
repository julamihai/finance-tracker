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
<header class="bg-gradient-to-r from-gray-800 via-gray-900 to-black shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <h1 class="text-3xl font-extrabold text-gray-200 tracking-wide border-b-2 border-gray-600 pb-1 hover:text-white transition duration-300">
            Finance-Tracker
        </h1>

        <!-- Navigation Links -->
        <nav class="flex space-x-6">
            <a href="{{ route('welcome') }}" class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300">Home</a>
            <a href="#about" class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300">About</a>
            <a href="#services" class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300">Services</a>
            <a href="#contact" class="text-gray-300 text-lg hover:text-gray-100 hover:underline transition duration-300">Contact</a>
            <a href="{{ route('login') }}" class="bg-gray-700 text-white font-medium py-2 px-4 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
                Account
            </a>
        </nav>
    </div>
</header>



<div class="container mx-auto py-8">
    @yield('content')
</div>
