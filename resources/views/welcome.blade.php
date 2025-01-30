@extends('welcomelayout')
@section('title', 'Welcome')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 text-white py-20 rounded-xl shadow-lg mb-8">
        <div class="container mx-auto text-center px-6">
            <!-- Title with typewriter effect -->
            <h2 class="text-5xl font-extrabold mb-6 typewriter">Welcome to Finance-Tracker</h2>
            <!-- Description with typewriter effect -->
            <p class="text-xl text-gray-300 typewriter">Take control of your finances with ease and clarity.</p>
        </div>
    </section>

    <!-- Custom CSS for the typewriter effect -->
    <style>
        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }
        .typewriter {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            border-right: 4px solid #fff;
            animation: typing 4s steps(40) 1s forwards, blink 0.75s step-end infinite;
        }
    </style>
    <!-- About Section -->
    <section id="about" class="py-16 bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 rounded-xl shadow-lg mb-8">
        <div class="container mx-auto px-8">
            <h2 class="text-4xl font-bold mb-6 text-white">About</h2>
            <p class="text-lg text-gray-300 leading-relaxed">This project was created to deepen my knowledge of the Laravel Framework and to offer users a powerful tool to manage their finances effectively.</p>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services" class="bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 py-16 rounded-xl shadow-lg mb-8">
        <div class="container mx-auto px-8">
            <h2 class="text-4xl font-bold mb-8 text-white text-center">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Categories -->
                <div class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-white mb-4">Categories</h3>
                    <p class="text-gray-200">Easily categorize your incomes and expenses to better analyze your financial trends.</p>
                </div>
                <!-- Incomes/Expenses -->
                <div class="bg-gradient-to-r from-green-400 via-teal-500 to-blue-500 p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-white mb-4">Incomes/Expenses</h3>
                    <p class="text-gray-200">Track your incomes and expenses with precision to gain better financial control.</p>
                </div>
                <!-- Dashboard -->
                <div class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-white mb-4">Dashboard</h3>
                    <p class="text-gray-200">Visualize your financial data clearly and make informed decisions with our intuitive dashboard.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gradient-to-r from-gray-800 via-gray-900 to-black flex justify-center items-center">
        <div class="container mx-auto px-8 flex justify-center items-center">
            <div class="max-w-md w-full bg-gray-800 shadow-xl rounded-lg px-8 py-6">
                <h2 class="text-2xl text-center text-white font-bold mb-6">Contact Me via Email</h2>

                <form action="{{route('contact.message')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-300 text-sm font-semibold mb-2">Your Name</label>
                        <input type="text" id="name" name="name" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-300 text-sm font-semibold mb-2">Your Email</label>
                        <input type="email" id="email" name="email" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block text-gray-300 text-sm font-semibold mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-300 bg-gray-700 focus:outline-none focus:shadow-outline" placeholder="Enter your message" required></textarea>
                    </div>

                    <div class="flex items-center justify-between space-x-4">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

