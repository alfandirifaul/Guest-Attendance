@extends('layouts.app')

@section('content')
    <header>
        <nav class="bg-[rgb(7,38,68)] shadow-lg top-0 fixed w-full z-50">
            <div class="max-w-8xl mx-auto px-20">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <div class="flex space-x-4">
                        <a href="{{ route('guests.index') }}" class="flex items-center py-5 px-2">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 mr-2">
                            <span class="font-bold text-white text-2xl">SMK-SMTI PONTIANAK</span>
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-6 text-xl font-bold">
                        <a href="{{ route('guests.index') }}" class="text-white hover:text-blue-500 transition duration-300">Home</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="min-h-screen flex items-center justify-center bg-gray-100 mb-[-70px]">
            <!-- Main Container -->
            <div class="hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-in-out w-full max-w-6xl bg-white rounded-xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">

                <!-- Left Side (Image & Info) -->
                <div class="relative bg-[rgb(7,38,68)] text-white flex items-center justify-center">
                    <img src="{{ asset('images/smti-image.jpg') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover opacity-60">
                    <div class="relative z-10 p-12 text-center">
                        <h2 class="text-4xl font-extrabold mb-4">Welcome to SMK-SMTI Pontianak
                            Guest Registration Dashboard</h2>
                        <p class="text-lg">
                            Manage and track guest attendance seamlessly. A secure and efficient solution tailored for your needs.
                        </p>
                    </div>
                </div>

                <!-- Right Side (Login Form) -->
                <div class="p-12">

                    <!-- Logo -->
                    <div class="flex justify-center mb-8">
                        <a href="{{ route('guests.index') }}" class="flex items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 mr-2">
                            <span class="text-3xl font-bold text-[rgb(7,38,68)]">SMK-SMTI Pontianak</span>
                        </a>
                    </div>

                    <!-- Title -->
                    <h1 class="text-xl font-medium text-center mb-8">Please login to access Guest Dashboard</h1>

                    <!-- Display Errors -->
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-8">
                        @csrf

                        <!-- Username Input -->
                        <div class="relative">
                            <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                            <x-text-input
                                type="text"
                                id="username"
                                name="username"
                                class="w-full border border-[rgb(7,38,68)] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[rgb(7,38,68)] focus:border-transparent"
                                placeholder="Enter your username"
                                required
                            />
                        </div>

                        <!-- Password Input -->
                        <div class="relative">
                            <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                            <x-text-input
                                type="password"
                                id="password"
                                name="password"
                                class="w-full border border-[rgb(7,38,68)] rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[rgb(7,38,68)] focus:border-transparent"
                                placeholder="Enter your password"
                                required
                            />
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full bg-[rgb(7,38,68)] hover:bg-[rgb(7,58,88)] text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-in-out"
                        >
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-[rgb(222,170,21)] py-6">
        <div class="container mx-auto px-6 text-center">
            <p class="text-white">&copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.</p>
        </div>
    </footer>

@endsection
