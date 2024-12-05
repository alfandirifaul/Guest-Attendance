@extends('layouts.app')

@section('content')
    <header class="mt-20">
        <nav class="bg-[rgb(7,38,68)] shadow-lg top-0 fixed w-full z-50">
            <div class="max-w-10xl mx-auto px-20">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <div class="flex space-x-4">
                        <a href="{{ route('guests.index') }}" class="flex items-center py-5 px-2 text-gray-700">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 mr-2">
                            <span class="font-bold text-white text-2xl">SMK-SMTI PONTIANAK</span>
                        </a>
                    </div>

                    <div class="hidden md:flex items-center justify-center space-x-6 text-xl font-bold">
                        <button id="hamburger-btn" class="p-4 text-white font-bold text-4xl flex items-center justify-center mt-[-10px]">
                            ☰
                        </button>
                    </div>
                </div>

                <!-- Side Bar -->
                <aside>
                    <div id="sidebar"
                         class="fixed top-0 right-0 h-full w-72 bg-[rgb(7,38,68)] bg-opacity-75 backdrop-blur-md translate-x-full
                                    text-white transform transition-transform duration-300 shadow-lg rounded-tl-lg">
                        <div class="flex justify-between items-center p-7 bg-[rgb(7,38,68)] shadow-lg rounded-tl-lg">
                            <h1 class="text-2xl font-bold">More</h1>
                            <button id="sidebar-hide" class="text-2xl font-semibold text-white hover:text-gray-300">
                                ✕
                            </button>
                        </div>
                        <div class="p-6 space-y-8 mt-10">
                            <!-- Navigation Section -->
                            <div>
                                <h1 class="mb-2 text-lg font-bold text-white tracking-wider">Navigation</h1>
                                <nav class="space-y-4">
                                    <a href="{{ route('guests.index') }}"
                                       class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300
                                                  py-3 px-6 rounded-lg space-x-3 transform hover:translate-x-2">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Home</span>
                                    </a>
                                </nav>
                            </div>

                            @auth
                                <div>
                                    <h1 class="mb-2 text-lg font-bold text-white tracking-wider">Admin</h1>
                                    <nav>
                                        <a href="{{ route('guests.export') }}" id="export-btn"
                                           class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300
                                                  py-3 px-6 rounded-lg space-x-3 w-full transform hover:translate-x-2">
                                            Export File
                                        </a>

                                        <form action="{{ route('guests.import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="file-upload"
                                                   class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300
                                                          py-3 px-6 rounded-lg space-x-3 w-full transform hover:translate-x-2">
                                                <span>Import File</span>
                                            </label>
                                            <input id="file-upload" type="file" name="file" class="hidden" onchange="this.form.submit()">
                                        </form>

                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300
                           py-3 px-6 rounded-lg space-x-3 w-full transform hover:translate-x-2">
                                                <span>Logout</span>
                                            </button>
                                        </form>
                                    </nav>
                                </div>
                            @endauth
                        </div>
                    </div>
                </aside>
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
            </div>

            @if($guests->isNotEmpty())
                <div class="overflow-x-auto rounded-lg shadow-lg">
                    <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-[rgb(222,170,21)] text-white">
                        <tr>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Name</th>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Origin</th>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Purpose</th>
                            <th class="py-3 px-6 text-left font-medium uppercase tracking-wider">Meet</th>
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
                                <td class="py-4 px-6 text-gray-700">{{ $guest->bertemu_dengan }}</td>
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

    <script>
        document.getElementById('export-btn').addEventListener('click', function(){
            fetch('/guests/export')
                .then(response => {
                    if(response.ok) {
                        alert('File exported successfully');
                        window.location.href = '/guests/export';
                    }
                    else {
                        alert('Failed to export file');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                })
        })
    </script>

@endsection
