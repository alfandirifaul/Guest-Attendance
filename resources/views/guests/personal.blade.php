@extends('layouts.app')

@section('content')
    <!-- Navigation Bar -->
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
                        <a href="{{ route('dashboard') }}" class="text-white hover:text-blue-500 transition duration-300">Dashboard</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-gray-100 min-h-screen pt-40 pb-2">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-center items-center mb-16 text-slate-700 font-bold text-6xl">
                <h1 class="text-[rgb(7,38,68)]">
                    Guest Detail
                </h1>
            </div>
            <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden w-full hover:scale-105 transition transform duration-300">
                <div class="bg-gradient-to-r from-[rgb(222,170,21)] via-yellow-400 to-[rgb(222,200,51)] flex items-center justify-center p-8 md:w-1/2">
                    <img src="{{ asset('storage/image/' . $guest->foto) }}" alt="{{ $guest->nama }}"
                         class="rounded-md border-4 border-white shadow-md max-h-96">
                </div>
                <div class="p-24 md:w-1/2 flex flex-col justify-center space-x-4">
                    <h1 class="text-3xl font-bold text-[rgb(7,38,68)] mb-6 pl-4">{{ $guest->nama }}</h1>
                    <div class="space-y-4 text-[rgb(7,38,68)]">
                        <div class="flex items-center">
                            <span class="font-semibold text-[rgb(222,170,21)] w-32">Origin:</span>
                            <span class="pl-6 font-medium">{{ $guest->asal_instansi }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold text-[rgb(222,170,21)] w-32">Purpose:</span>
                            <span class="pl-6 font-medium">{{ $guest->tujuan }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold text-[rgb(222,170,21)] w-32">Meet:</span>
                            <span class="pl-6 font-medium">{{ $guest->bertemu_dengan }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold text-[rgb(222,170,21)] w-32">Phone:</span>
                            <span class="pl-6 font-medium">{{ $guest->nomor_hp }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-semibold text-[rgb(222,170,21)] w-32">Registered Date:</span>
                            <span class="pl-6 font-medium">{{ $guest->created_at->format('l, j F Y g:i ') }}</span>
                        </div>
                    </div>
                    <div class="mt-24 mb-[-60px]">
                        <a href="{{ url()->previous() }}"
                           class="inline-block px-6 py-3 bg-gradient-to-r from-[rgb(222,170,21)] to-yellow-400
                           text-white rounded-lg hover:shadow-lg hover:scale-105 transition-all duration-300">
                            &laquo; Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[rgb(7,38,68)] py-6">
        <div class="container mx-auto px-6 text-center">
            <p class="text-white text-sm lg:text-base">
                &copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.
            </p>
        </div>
    </footer>
@endsection
