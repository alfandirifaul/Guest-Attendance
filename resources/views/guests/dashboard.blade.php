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
        <div class="container mx-auto px-4 py-8 mt-20 mb-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-6">
                <!-- Left Section: Dashboard Title -->
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-8">Dashboard</h1>
                    <div class="flex space-x-2">
                        <p id="greeting" class=" font-bold text-lg text-slate-700"></p>
                        <p class="animate-pulse duration-1">|</p>

                        @auth
                            <p class="text-slate-600 text-lg font-medium">{{ ucfirst($user->name) }}</p>
                        @else
                            <p class="text-slate-600 text-lg font-medium">Admin</p>
                        @endauth
                    </div>
                </div>

                <!-- Right Section: Date -->
                <div class="mt-2 lg:mt-0 justify-between items-center">
                    <p class="text-slate-700 font-bold text-lg">Today's Date:</p>
                    <p class="text-slate-700 text-lg font-medium" id="current-time"></p>
                </div>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-10">
                <!-- Weekly Guests -->
                <a href="{{ route('guests.weekly') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-lg shadow hover:scale-105 transition duration-300">
                    <h2 class="text-lg font-semibold">Total Guests This Week</h2>
                    <p class="text-4xl font-bold">{{ $weeklyGuests }} Guests</p>
                </a>

                <!-- Monthly Guests -->
                <a href="{{ route('guests.monthly') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white p-6 rounded-lg shadow hover:scale-105 transition duration-300">
                    <h2 class="text-lg font-semibold">Total Guests This Month</h2>
                    <p class="text-4xl font-bold">{{ $monthlyGuests }} Guests</p>
                </a>

                <!-- Yearly Guests -->
                <a href="{{ route('guests.yearly') }}" class="bg-gradient-to-r from-purple-500 to-purple-700 text-white p-6 rounded-lg shadow hover:scale-105 transition duration-300">
                    <h2 class="text-lg font-semibold">Total Guests This Year</h2>
                    <p class="text-4xl font-bold">{{ $yearlyGuests }} Guests</p>
                </a>

                <!-- All-Time Guests -->
                <a href="{{ route('guests.showAll') }}" class="bg-gradient-to-r from-orange-500 to-orange-700 text-white p-6 rounded-lg shadow hover:scale-105 transition duration-300">
                    <h2 class="text-lg font-semibold">Total Guests (All Time)</h2>
                    <p class="text-4xl font-bold">{{ $totalGuests }} Guests</p>
                </a>
            </div>

            <!-- Recently Added Guests -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-4">Recently Registered Guests</h2>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="table-auto w-full">
                        <thead class="bg-[rgb(222,170,21)] text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Origin</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Purpose</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Meet</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($recentGuests as $guest)
                            <tr class="border-t hover:bg-gray-100"
                                onclick="window.location='{{ route('guests.showPersonal', ['id' => $guest->id]) }}';">
                                <td class="px-6 py-4 text-gray-800">{{ $guest->nama }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $guest->asal_instansi }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $guest->tujuan }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $guest->bertemu_dengan }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $guest->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-[rgb(7,38,68)] py-6 mt-auto">
        <div class="container mx-auto px-6 text-center">
            <p class="text-white">&copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.</p>
        </div>
    </footer>

    <script>
        //***************** S: greeting
        const greetings = {
            en: {
                morning: "Good Morning",
                afternoon: "Good Afternoon",
                evening: "Good Evening"
            },
            id: {
                morning: "Selamat Pagi",
                afternoon: "Selamat Siang",
                evening: "Selamat Malam"
            },
            fr: {
                morning: "Bonjour",
                afternoon: "Bon Après-midi",
                evening: "Bonsoir"
            },
            de: {
                morning: "Guten Morgen",
                afternoon: "Guten Tag",
                evening: "Guten Abend"
            },
            jp: {
                morning: "おはようございます",
                afternoon: "こんにちは",
                evening: "こんばんは"
            },
            kr: {
                morning: "좋은 아침",
                afternoon: "안녕하세요",
                evening: "안녕하세요"
            },
            zh: {
                morning: "早上好",
                afternoon: "下午好",
                evening: "晚上好"
            },

        };

        const languages = Object.keys(greetings);

        function greetingAnimation(elementId, text) {
            const element = document.getElementById(elementId);
            element.textContent = "";
            let index = 0;

            const interval = setInterval(() => {
                if (index < text.length) {
                    element.textContent += text[index];
                    index++;
                } else {
                    clearInterval(interval);
                }
            }, 300); // interval to set speed each language
        }

        function getGreeting(language) {
            const hour = new Date().getHours();
            if (hour < 12) {
                return greetings[language].morning;
            } else if (hour < 17) {
                return greetings[language].afternoon;
            } else {
                return greetings[language].evening;
            }
        }

        function startAlternatingGreeting() {

            let currentLanguageIndex = 0;

            function updateGreeting() {
                const currentLanguage = languages[currentLanguageIndex];
                const greeting = getGreeting(currentLanguage);
                greetingAnimation("greeting", greeting);

                currentLanguageIndex = (currentLanguageIndex + 1) % languages.length;
            }
            updateGreeting();
            setInterval(updateGreeting, 10000); // interval to change every language
        }
        //***************** E: greeting

        startAlternatingGreeting();
    </script>

@endsection
