@extends('layouts.app')

@section('content')
        <header class="mt-20">
            <nav class="bg-[rgb(7,38,68)] shadow-lg top-0 fixed w-full z-50">
                <div class="max-w-10xl mx-auto px-20">
                    <div class="flex justify-between items-center">
                        <!-- Logo -->
                        <div class="flex space-x-4">
                            <a href="#" class="flex items-center py-5 px-2 text-gray-700">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 mr-2">
                                <span class="font-bold text-white text-2xl">SMK-SMTI PONTIANAK</span>
                            </a>
                        </div>

                        <div class="hidden md:flex items-center justify-center space-x-6 text-xl font-bold">
                            <a id="home-hide" href="#" class="text-white hover:text-blue-500 transition duration-300 flex items-center">
                                Home
                            </a>
                            <a id="about-hide" href="#about" class="text-white hover:text-blue-500 transition duration-300 flex items-center">
                                About
                            </a>
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
                                        <a href="#"
                                           class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300
                                                  py-3 px-6 rounded-lg space-x-3 transform hover:translate-x-2">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>Home</span>
                                        </a>
                                        <a href="#about"
                                           class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300
                                                  py-3 px-6 rounded-lg space-x-3 transform hover:translate-x-2">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>About</span>
                                        </a>
                                        <a href="https://smtipontianak.sch.id/"
                                           class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300
                                                  py-3 px-6 rounded-lg space-x-3 transform hover:translate-x-2">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>Website</span>
                                        </a>
                                        <a href="{{ route('dashboard') }}"
                                           class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300 py-3 px-6 rounded-lg space-x-3 transform hover:translate-x-2">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </nav>
                                </div>

                                @auth
                                    <div>
                                        <h1 class="mb-2 text-lg font-bold text-white tracking-wider">Admin</h1>
                                        <nav>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button class="flex items-center text-white hover:bg-[rgb(7,38,68)] hover:text-white transition duration-300 py-3 px-6 rounded-lg space-x-3 w-full transform hover:translate-x-2">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <span>Logout</span>
                                                </button>
                                            </form>
                                        </nav>
                                    </div>
                                @endauth
                            </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </nav>
        </header>

        <main>
            <section class="bg-[url('{{ asset('images/smti-image.jpg') }}')] bg-cover bg-center bg-no-repeat text-white py-20 mt-2">
                <div class="container mx-auto px-20 text-center relative flex justify-center items-center">
                    <!-- Background Overlay -->
                    <div class="absolute inset-0 bg-slate-700 opacity-45 py-50 px-50 top-[-25px] bottom-[-25px]"></div>

                    <div id="time-container" class="absolute top-5 left-0 right-0 mx-auto flex flex-col items-center text-white h-[3.5rem] mb-6">
                        <p id="current-time" class="text-sm"></p>
                        <!-- Halo -->
                        <p id="halo" class="text-4xl font-bold mt-4"></p>
                    </div>

                    <div class="relative">
                        <h2 class="mt-36 text-6xl font-bold mb-6">Welcome to SMK-SMTI Pontianak <br> Guest Registration Website</h2>
                        <p class="mb-20 font-medium text-xl text-justify mt-10">
                            This platform is exclusively designed for recording the identities and details of guests who visit SMK-SMTI Pontianak.
                            The information collected here is solely used for administrative purposes and to enhance our visitor management system.
                            Please ensure that the details you provide are accurate and complete. Your cooperation is highly appreciated. Thank you!
                        </p>
                        <p class="mb-2 font-bold text-white mt-10">Please register your identity to inform us your visit.</p>
                        <a href="{{ route('guests.create') }}"
                           class=" mb-20 mt-5 bg-[rgb(222,170,21)] hover:bg-[rgb(222,200,51)]  text-white py-4 px-8 w-[200px] text-lg font-semibold rounded-lg inline-block
                                    transition transform hover:scale-105 duration-300">
                            Register
                        </a>
                    </div>
                </div>
            </section>

            <section id="about" class="bg-white py-20 w-full">
                <!-- About Us -->
                <div class="mx-auto px-6 text-center">
                    <h2 class="text-4xl font-bold text-[rgb(7,38,68)]  mb-8">About Us</h2>
                    <p class="text-gray-600 max-w-4xl mx-auto text-justify">
                        SMK-SMTI Pontianak adalah salah satu dari sembilan SMK di Indonesia yang bernaung di bawah
                        Badan Pengembangan Sumber Daya Manusia Industri (BPSDMI) Kementerian Perindustrian RI.
                        SMK SMTI Pontianak yang dulunya adalah STMA didirikan pada tanggal 15 Januari 1968 yang dikukuhkan dengan SK Gubernur KDH Tk.1 Kalimantan Barat No. 01/11-E/68. Pengelolaan SMTI Pontianak diserah terimakan dari Pemda Tk. 1 Kalimantan Barat ke Pihak Departemen Perindustrian. Pusat Pembinaan Pelatihan Keterampilan dan Kejuruan Industri. Sedangkan ijazah SMK SMTI dinilai, dihargai dan disamakan dengan ijazah Sekolah Menengah Kejuruan Negeri berdasarkan SK Mendikbud RI No. 1277/C/Kep/1/87.

                        SMK SMTI Pontianak merupakan Sekolah Menengah Kejuruan Negeri di bawah Kementerian Perindustrian atau pada pendataan sekolah di Kemdikbud yaitu SMKN TI Pontianak dengan NPSN 30108179 memiliki empat program studi yaitu:
                        <br>

                        1) Kimia Industri <br>

                        2) Teknik Pemesinan <br>

                        3) Analisis Pengujian Laboratorium <br>

                        4) Teknik Otomasi Industri
                    </p>
                </div>
            </section>

            <section class="bg-[rgb(7,38,68)] py-20">
                <div class="mx-auto px-6 flex flex-col md:flex-row md:space-x-6">
                    <!-- Follow Us -->
                    <div id="follow-us" class="flex-1 bg-white p-6 shadow-lg rounded hover:shadow-2xl hover:translate-y-[-10px] transition-all duration-300 ease-in-out">
                        <h2 class="text-3xl font-bold text-[rgb(7,38,68)]  mb-4 text-center">Follow Us</h2>
                        <div class="flex flex-col items-center justify-center mt-10 space-y-6">
                            <!-- Instagram -->
                            <a href="https://www.instagram.com/smksmtipontianak" target="_blank" class="w-full max-w-xs">
                                <div class="flex items-center p-4 hover:bg-slate-100 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-2 text-slate-700 transition transform duration-300">
                                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="w-8 h-8 mr-4">
                                    <span class="font-semibold">@smksmtipontianak</span>
                                </div>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/smtipontianak/" target="_blank" class="w-full max-w-xs">
                                <div class="flex items-center p-4 hover:bg-slate-100 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-2 transition transform duration-300">
                                    <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-8 h-8 mr-4">
                                    <span class="font-semibold">SMTI-Pontianak</span>
                                </div>
                            </a>

                            <!-- YouTube -->
                            <a href="https://www.youtube.com/channel/UCarm2nueXuPeVSFjMUWHixA" target="_blank" class="w-full max-w-xs">
                                <div class="flex items-center p-4 hover:bg-slate-100 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-2 transition transform duration-300">
                                    <img src="{{ asset('images/youtube.png') }}" alt="YouTube" class="w-8 h-8 mr-4">
                                    <span class="font-semibold">SMTI PONTIANAK TV</span>
                                </div>
                            </a>

                            <!-- TikTok -->
                            <a href="https://www.tiktok.com/@smksmtipontianak" target="_blank" class="w-full max-w-xs">
                                <div class="flex items-center p-4 hover:bg-slate-100 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-2 transition transform duration-300">
                                    <img src="{{ asset('images/tiktok.png') }}" alt="TikTok" class="w-8 h-8 mr-4">
                                    <span class="font-semibold">@smksmtipontianak</span>
                                </div>
                            </a>

                            <!-- X (Twitter) -->
                            <a href="https://twitter.com/smtiptk" target="_blank" class="w-full max-w-xs">
                                <div class="flex items-center p-4 hover:bg-slate-100 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-2 text-slate-700 transition transform duration-300">
                                    <img src="{{ asset('images/twitter.png') }}" alt="X" class="w-8 h-8 mr-4">
                                    <span class="font-semibold">@smtiptk</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div id="contact-us" class="flex-1 bg-white p-6 shadow-lg rounded hover:shadow-2xl hover:translate-y-[-10px] transition-all duration-300 ease-in-out">
                        <h2 class="text-3xl font-bold text-[rgb(7,38,68)]  mb-4 text-center">Contact Us</h2>
                        <div class="text-[rgb(7,38,68)]  mt-20">
                            <p class="mb-4"><strong>Address:</strong><br>Jl. Sulawesi Dalam No.31, Akcaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113</p>
                            <p class="mb-4"><strong>Phone:</strong><br>0856-5494-1105</p>
                            <p class="mb-4"><strong>Email:</strong><br>infokomsmtiptk@gmail.com</p>
                            <p><strong>Website:</strong><br></p>
                            <a href="https://smtipontianak.sch.id/" class="mb-4 hover:underline hover:text-blue-500">smtipontianak.sch.id</a>
                        </div>
                    </div>

                    <!-- Our Location -->
                    <div id="our-location" class="flex-1 bg-white p-6 shadow-lg rounded hover:shadow-2xl hover:translate-y-[-10px] transition-all duration-300 ease-in-out">
                        <h2 class="text-3xl font-bold text-[rgb(7,38,68)] mb-4 text-center">Our Location</h2>
                        <div class="flex justify-center mt-12">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15959.268391237905!2d109.327835!3d-0.044853!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5979aaaf9313%3A0x881894f2ce4337bb!2sSMK-SMTI%20Pontianak!5e0!3m2!1sid!2sid!4v1733030380109!5m2!1sid!2sid"
                                width="100%"
                                height="350"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-[rgb(222,170,21)] py-6">
            <div class="container mx-auto px-6 text-center">
                <p class="text-white">&copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.</p>
            </div>
        </footer>

    <script>
        //***************** S: halo
        const halos = {
            en: "Hello",
            id: "Halo",
            fr: "Bonjour",
            de: "Hallo",
            jp: "こんにちは",
            kr: "안녕하세요",
            zh: "你好",
            es: "Hola",
            it: "Ciao",
            ru: "Привет",
            pt: "Olá",
            ar: "مرحبا",
            hi: "नमस्ते",
            th: "สวัสดี",
            vi: "Xin chào",
            ph: "Kumusta",
        };

        const haloLanguages = Object.keys(halos);

        function haloAnimation(elementId, text) {
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
            }, 300); // interval to set speed for each letter
        }

        function getHalo(language) {
            return halos[language];
        }

        function startAlternatingHalo() {
            let currentHaloLanguageIndex = 0;

            function updateHalo() {
                const currentLanguage = haloLanguages[currentHaloLanguageIndex];
                const halo = getHalo(currentLanguage);
                haloAnimation("halo", halo);

                currentHaloLanguageIndex = (currentHaloLanguageIndex + 1) % haloLanguages.length;
            }

            updateHalo();
            setInterval(updateHalo, 10000); // interval to change every language
        }
        //***************** E: halo
        startAlternatingHalo();




    </script>
@endsection
