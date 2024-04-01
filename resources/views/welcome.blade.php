@extends('welcomelayout')
@section('title', 'Welcome')
@section('content')

<!-- Hero Section -->
<section class="bg-gray-800 text-white py-20 rounded-xl shadow-md mb-6">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4">Welcome to Finance-Tracker</h2>
        <p class="text-lg">Welcome, to the place where you can take care of your finances.</p>
        <a href="#" class="bg-white text-blue-500 font-bold py-2 px-6 rounded-full mt-8 inline-block hover:bg-blue-600 hover:text-white">Learn More</a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white rounded-xl shadow-md mb-6">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">About</h2>
        <p class="text-lg text-gray-700">I have undertaken this project to expand my understanding of the Laravel Framework.</p>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="bg-gray-800 py-20 rounded-xl shadow-md">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-white">Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-r from-purple-400 to-pink-500 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4 text-white">Categories</h3>
                <p class="text-gray-100">You can categorize your incomes and expenses to better organize and analyze your financial data.</p>
            </div>
            <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4 text-white">Incomes/Expenses</h3>
                <p class="text-gray-100">You can add incomes and expenses along with their respective amounts to better understand your financial situation.</p>
            </div>
            <div class="bg-gradient-to-r from-yellow-400 to-orange-500 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4 text-white">Dashboard</h3>
                <p class="text-gray-100">The incomes and expenses you add will be displayed on the dashboard, providing you with a clear overview of your financial transactions.</p>
            </div>
        </div>
    </div>

</section>


<!-- Contact Section -->
<section class="py-20" id="contact">
    <div class="container mx-auto px-8 py-6 bg-white rounded-xl">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">Contact Us</h2>
        <form action="#" class="max-w-lg mx-auto">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Your Name</label>
                <input type="text" id="name" name="name" class="border-2 border-gray-300 rounded-md w-full py-2 px-4 focus:outline-none focus:border-blue-500" placeholder="Your Name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Your Email</label>
                <input type="email" id="email" name="email" class="border-2 border-gray-300 rounded-md w-full py-2 px-4 focus:outline-none focus:border-blue-500" placeholder="Your Email">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                <textarea id="message" name="message" rows="5" class="border-2 border-gray-300 rounded-md w-full py-2 px-4 focus:outline-none focus:border-blue-500" placeholder="Your Message"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">Send Message</button>
        </form>
    </div>
</section>

</body>

</html>
@endsection
