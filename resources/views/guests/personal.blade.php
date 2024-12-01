@extends('layouts.app')

@section('content')
    <!-- Navigation Bar -->
    <header>
        <nav class="bg-[rgb(7,38,68)] shadow-lg top-0 fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4">
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
        <div class="mt-20 container mx-auto px-6 py-10">
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">
                Guest Details
            </h1>

            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center">
                    <img src="{{ asset('storage/image/' . $guest->foto) }}" alt="{{ $guest->nama }}" class="w-32 h-32 object-cover mr-6 rounded-full">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">{{ $guest->nama }}</h2>
                        <p class="text-gray-700 mb-1"><strong>Origin:</strong> {{ $guest->asal_instansi }}</p>
                        <p class="text-gray-700 mb-1"><strong>Purpose:</strong> {{ $guest->tujuan }}</p>
                        <p class="text-gray-700 mb-1"><strong>Phone Number:</strong> {{ $guest->nomor_hp }}</p>
                        <p class="text-gray-700"><strong>Time:</strong> {{ $guest->created_at->format('F j, Y, g:i a') }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('guests.showAll') }}" class="text-blue-500 hover:underline">&laquo; Back to Guest List</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[rgb(7,38,68)] py-6 mt-auto">
        <div class="container mx-auto px-6 text-center">
            <p class="text-white">&copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.</p>
        </div>
    </footer>
@endsection
