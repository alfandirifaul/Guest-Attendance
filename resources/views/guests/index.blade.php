@extends('layouts.app')

@section('content')
    <div class="px-50 py-20">
        <nav class="bg-[rgb(7,38,68)] shadow-lg top-0 fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <div class="flex space-x-4">
                        <a href="#" class="flex items-center py-5 px-2 text-gray-700">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 mr-2">
                            <span class="font-bold text-white text-2xl">SMK-SMTI PONTIANAK</span>
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden md:flex items-center space-x-6 font-bold text-xl">
                        <a href="#" class="py-2 px-4 text-white hover:text-blue-500">Home</a>
                        <a href="#about" class="py-2 px-4 text-white hover:text-blue-500">More</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="bg-[url('{{ asset('images/smti-image.jpg') }}')] bg-cover bg-center bg-no-repeat text-white py-20 mt-4">
            <div class="container mx-auto px-20 text-center relative flex justify-center items-center">
                <div class="absolute inset-0 bg-slate-700 opacity-45 py-50 px-50 top-[-25px] bottom-[-25px]"></div>
                <div class="relative">
                    <h2 class="mt-20 text-6xl font-bold mb-8">Welcome to SMK-SMTI Pontianak <br> Guest Registration Website</h2>
                    <p class="mb-36 font-medium text-xl text-justify mt-20">
                        This platform is exclusively designed for recording the identities and details of guests who visit SMTI Pontianak.
                        The information collected here is solely used for administrative purposes and to enhance our visitor management system.
                        Please ensure that the details you provide are accurate and complete. Your cooperation is highly appreciated. Thank you!                    </p>
                    <p class="mb-4 font-bold text-white">Please register your identity to inform me that you has been visit us.</p>
                    <a href="{{ route('guests.create') }}"
                       class=" mb-20 mt-5 bg-[rgb(222,170,21)] hover:bg-[rgb(222,200,51)]  text-white py-4 px-8 w-[200px] text-lg font-semibold rounded-lg inline-block">
                        Register
                    </a>
                </div>
            </div>
        </section>

        <section id="about" class="bg-white py-20 w-full">
            <!-- About Us -->
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold text-gray-800 mb-8">About Us</h2>
                <p class="text-gray-600 max-w-4xl mx-auto text-justify">
                    SMK-SMTI Pontianak adalah salah satu dari sembilan SMK di Indonesia yang bernaung di bawah
                    Badan Pengembangan Sumber Daya Manusia Industri (BPSDMI) Kementerian Perindustrian RI.
                    SMK SMTI Pontianak yang dulunya adalah STMA didirikan pada tanggal 15 Januari 1968 yang dikukuhkan dengan SK Gubernur KDH Tk.1 Kalimantan Barat No. 01/11-E/68. Pengelolaan SMTI Pontianak diserah terimakan dari Pemda Tk. 1 Kalimantan Barat ke Pihak Departemen Perindustrian. Pusat Pembinaan Pelatihan Keterampilan dan Kejuruan Industri. Sedangkan ijazah SMK SMTI dinilai, dihargai dan disamakan dengan ijazah Sekolah Menengah Kejuruan Negeri berdasarkan SK Mendikbud RI No. 1277/C/Kep/1/87.

                    SMK SMTI Pontianak merupakan Sekolah Menengah Kejuruan Negeri di bawah Kementerian Perindustrian atau pada pendataan sekolah di Kemdikbud yaitu SMKN TI Pontianak dengan NPSN 30108179 memiliki empat  program studi yaitu:
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
                <div class="flex-1 bg-white p-6 shadow-lg rounded hover:shadow-2xl hover:translate-y-[-10px] transition-all duration-300 ease-in-out">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Follow Us</h2>
                    <div class="flex flex-col items-center justify-center mt-10">
                        <!-- Instagram -->
                        <p><strong>Instagram:</strong><br></p>
                        <a href="https://www.instagram.com/smksmtipontianak" target="_blank"
                           class="mb-6 flex items-center space-x-3 text-gray-700  hover:text-pink-500 transition-colors duration-300 hover:underline">
                            smtipontianak.sch.id
                        </a>

                        <p><strong>Facebook:</strong><br></p>
                        <a href="https://www.facebook.com/smtipontianak/" target="_blank"
                           class="mb-6 flex items-center space-x-3 text-gray-700  hover:text-blue-500 transition-colors duration-300 hover:underline">
                            SMTI-Pontianak
                        </a>

                        <p><strong>Youtube:</strong><br></p>
                        <a href="https://www.youtube.com/channel/UCarm2nueXuPeVSFjMUWHixA" target="_blank"
                           class="mb-6 flex items-center space-x-3 text-gray-700  hover:text-red-500 transition-colors duration-300 hover:underline">
                            SMTI PONTIANAK TV
                        </a>

                        <p><strong>Tiktok:</strong><br></p>
                        <a href="tiktok.com/@smksmtipontianak" target="_blank"
                           class="mb-6 flex items-center space-x-3 text-gray-700  hover:text-slate-500 transition-colors duration-300 hover:underline">
                            @smksmtipontianak
                        </a>

                        <p><strong>X:</strong><br></p>
                        <a href="twitter.com/smtiptk" target="_blank"
                           class="mb-6 flex items-center space-x-3 text-gray-700  hover:text-slate-500 transition-colors duration-300 hover:underline">
                            @smtiptk
                        </a>



                    </div>
                </div>

                <div class="flex-1 bg-white p-6 shadow-lg rounded hover:shadow-2xl hover:translate-y-[-10px] transition-all duration-300 ease-in-out">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Contact Us</h2>
                    <div class="text-gray-700">
                        <p class="mb-4"><strong>Address:</strong><br>Jl. Sulawesi Dalam No.31, Akcaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113</p>
                        <p class="mb-4"><strong>Phone:</strong><br>0856-5494-1105</p>
                        <p class="mb-4"><strong>Email:</strong><br>infokomsmtiptk@gmail.com</p>
                        <p><strong>Website:</strong><br></p>
                        <a href="https://smtipontianak.sch.id/" class="mb-4 hover:underline hover:text-blue-500">smtipontianak.sch.id</a>

                    </div>
                </div>

                <!-- Our Location -->
                <div class="flex-1 bg-white p-6 shadow-lg rounded hover:shadow-2xl hover:translate-y-[-10px] transition-all duration-300 ease-in-out">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Our Location</h2>
                    <div class="flex justify-center">
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

        <!-- Footer -->
        <footer class="bg-[rgb(222,170,21)] py-6">
            <div class="container mx-auto px-6 text-center">
                <p class="text-white">&copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.</p>
            </div>
        </footer>
    </div>


    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        const btn = document.querySelector('.mobile-menu-button');
        const menu = document.querySelector('.mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
@endsection
