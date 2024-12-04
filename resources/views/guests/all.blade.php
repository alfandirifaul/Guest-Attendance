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
                        <a href="{{ route('dashboard') }}" class="text-white hover:text-blue-500 transition duration-300">Dashboard</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="mt-20 container mx-auto px-6 py-10">
            <div class="relative flex items-center mb-4">
                <!-- Back Link -->
                <div class="absolute left-0">
                    <a href="{{ route('dashboard') }}" class="text-[rgb(222,170,21)] hover:underline">
                        &laquo; Back to dashboard
                    </a>
                </div>
                <!-- Title -->
                <h1 class="mx-auto text-3xl font-bold text-gray-800">
                    {{ $title }}
                </h1>

                <a href="{{ route('guests.export') }}"
                   class="inline-block px-6 py-3 bg-gradient-to-r from-[rgb(222,170,21)] to-yellow-400
                           text-white rounded-lg hover:shadow-lg hover:scale-105 transition-all duration-300">
                    Export File
                </a>
            </div>

            @if($guests->isNotEmpty())
                <div class="overflow-x-auto rounded-lg shadow-lg">
                    <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-[rgb(222,170,21)] text-white">
                        <tr>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Name</th>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Origin</th>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Purpose</th>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Phone Number</th>
                            <th class="py-3 px-6 text-center font-medium uppercase tracking-wider">Photo</th>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($guests as $guest)
                            <tr class="border-b hover:bg-gray-100"
                                onclick="window.location='{{ route('guests.showPersonal', ['id' => $guest->id]) }}';">
                                <td class="py-4 px-6 text-gray-700">{{ $guest->nama }}</td>
                                <td class="py-4 px-6 text-gray-700">{{ $guest->asal_instansi }}</td>
                                <td class="py-4 px-6 text-gray-700">{{ $guest->tujuan }}</td>
                                <td class="py-4 px-6 text-gray-700">{{ $guest->nomor_hp }}</td>
                                <td class="py-4 px-6 text-center">
                                    <img src="{{ asset('storage/image/' . $guest->foto) }}"
                                         alt="{{ $guest->nama }}"
                                         class="w-16 h-16 object-cover shadow-sm">
                                </td>
                                <td class="py-4 px-6 text-gray-500">{{ $guest->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5 mb-10">
                    {{ $guests->links() }}
                </div>
            @else
                <p class="text-center text-gray-500 mt-10 text-xl">
                    No guests found. There is no visitors!
                </p>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[rgb(7,38,68)] py-6 mt-auto">
        <div class="container mx-auto px-6 text-center">
            <p class="text-white">&copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.</p>
        </div>
    </footer>

@endsection
