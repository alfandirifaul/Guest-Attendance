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
        <div class="container mx-auto px-4 py-8 mt-20 mb-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-6">
                <!-- Left Section: Dashboard Title -->
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-8">Dashboard</h1>
                    <div class="flex space-x-2">
                        <p id="greeting" class="font-bold text-lg text-slate-700"></p>
                        <p>|</p>
                        <p class="text-slate-600 text-lg font-medium">Admin</p>
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
                    <p class="text-4xl font-bold">{{ $weeklyGuests }}</p>
                </a>

                <!-- Monthly Guests -->
                <a href="{{ route('guests.monthly') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white p-6 rounded-lg shadow hover:scale-105 transition duration-300">
                    <h2 class="text-lg font-semibold">Total Guests This Month</h2>
                    <p class="text-4xl font-bold">{{ $monthlyGuests }}</p>
                </a>

                <!-- Yearly Guests -->
                <a href="{{ route('guests.yearly') }}" class="bg-gradient-to-r from-purple-500 to-purple-700 text-white p-6 rounded-lg shadow hover:scale-105 transition duration-300">
                    <h2 class="text-lg font-semibold">Total Guests This Year</h2>
                    <p class="text-4xl font-bold">{{ $yearlyGuests }}</p>
                </a>

                <!-- All-Time Guests -->
                <a href="{{ route('guests.showAll') }}" class="bg-gradient-to-r from-orange-500 to-orange-700 text-white p-6 rounded-lg shadow hover:scale-105 transition duration-300">
                    <h2 class="text-lg font-semibold">Total Guests (All Time)</h2>
                    <p class="text-4xl font-bold">{{ $totalGuests }}</p>
                </a>
            </div>

            <!-- Recently Added Guests -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">Recently Registered Guests</h2>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="table-auto w-full">
                        <thead class="bg-[rgb(222,170,21)] text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Origin</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Purpose</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold ">Time Added</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($recentGuests as $guest)
                            <tr class="border-t hover:bg-gray-100"
                                onclick="window.location='{{ route('guests.showPersonal', ['id' => $guest->id]) }}';">
                                <td class="px-6 py-4 text-gray-800">{{ $guest->nama }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $guest->asal_instansi }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ $guest->tujuan }}</td>
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

        //***************** S: currently time
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false,
            };

            // Format date and time
            const formattedDate = new Intl.DateTimeFormat('en-ID', options).format(now);
            document.getElementById('current-time').textContent = `${formattedDate}`;
        }
        //***************** E: currently time

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
                evening: "晚上好)"
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
        setInterval(updateTime, 1000);
        updateTime();

    </script>

@endsection