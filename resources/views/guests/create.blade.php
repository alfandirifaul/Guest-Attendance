@extends('layouts.app')

@section('content')

    <header>
        <!-- Navigation Bar -->
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
        <!-- Hero Section -->
        <section class="bg-[rgb(222,170,21)] text-white py-10 mt-20">
            <div class="container mx-auto px-6">
                <div class="flex flex-col justify-center items-center text-center space-y-4 text-justify">
                    <p class="font-medium text-lg max-w-3xl">
                        We appreciate your visit and thank you for taking the time to complete the guest list.
                        By filling out the form, you acknowledge and agree to the terms and policies in place.
                        Rest assured, your information will not be used for any personal purposes. Kindly register your attendance below.
                    </p>
                </div>
            </div>
        </section>

        <div class="flex items-center justify-center py-4 bg-[rgb(7,38,68)] ">
            <p id="current-time" class="text-sm font-medium text-white"></p>
        </div>


        <!-- Form Section -->
        <section>
            <div id="form" class="px-10 py-20 bg-gray-50">
                <div class="mb-10 flex justify-center items-center text-center mt-[-40px]">
                    <h1 class="text-[rgb(7,38,68)] font-bold text-4xl">Guest Attendance <br> Registration Form</h1>
                </div>

                <!-- Form Container -->
                <form class="bg-white shadow-md rounded-lg p-8 space-y-6 max-w-5xl mx-auto" method="POST" action="{{ route('guests.store') }}">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <!-- Inputs and Camera Container -->
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-10 lg:space-y-0 lg:space-x-10">
                        <!-- Input Fields -->
                        <div class="flex flex-col space-y-6 lg:w-3/5">
                            <!-- Nama -->
                            <div class="flex flex-col">
                                <label for="nama" class="text-lg font-semibold text-gray-700 mb-2">Nama:</label>
                                <x-text-input value="{{ old('nama') }}" type="text" name="nama" id="nama" class="form-input p-3 border border-gray-300 rounded-lg" required />
                                @error('nama')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Asal Instansi -->
                            <div class="flex flex-col">
                                <label for="asal_instansi" class="text-lg font-semibold text-gray-700 mb-2">Asal Instansi:</label>
                                <x-text-input value="{{ old('asal_instansi') }}" type="text" name="asal_instansi" id="asal_instansi" class="form-input p-3 border border-gray-300 rounded-lg" required />
                                @error('asal_instansi')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tujuan -->
                            <div class="flex flex-col">
                                <label for="tujuan" class="text-lg font-semibold text-gray-700 mb-2">Tujuan:</label>
                                <x-text-input value="{{ old('tujuan') }}" type="text" name="tujuan" id="tujuan" class="form-input p-3 border border-gray-300 rounded-lg" required />
                                @error('tujuan')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Bertemu Dengan -->
                            <div class="flex flex-col">
                                <label for="bertemu_dengan" class="text-lg font-semibold text-gray-700 mb-2">Menemui:</label>
                                <x-text-input value="{{ old('bertemu_dengan') }}" type="text" name="bertemu_dengan" id="bertemu_dengan" class="form-input p-3 border border-gray-300 rounded-lg" required />
                                @error('bertemu_dengan')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nomor HP -->
                            <div class="flex flex-col">
                                <label for="nomor_hp" class="text-lg font-semibold text-gray-700 mb-2">Nomor HP:</label>
                                <x-text-input value="{{ old('nomor_hp') }}" type="number" name="nomor_hp" id="nomor_hp" class="form-input p-3 border border-gray-300 rounded-lg" required />
                                @error('nomor_hp')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Camera Section -->
                        <div class="bg-slate-100 rounded-lg p-4 lg:w-4/5 flex flex-col items-center">
                            <h2 class="text-lg font-semibold text-gray-700 mb-4">Foto:</h2>
                            <video id="video" class="rounded-md border mb-4" width="480" height="320" autoplay></video>
                            @error('foto')
                            <span class="text-red-500 text-sm mb-1 mt-[-10px]">{{ $message }}</span>
                            @enderror
                            <button type="button" id="snap"
                                    class="bg-[rgb(222,170,21)] hover:bg-[rgb(222,200,51)] text-white py-2 px-6 rounded-lg shadow-md transition duration-300 mt-3 mb-3">
                                Capture Photo
                            </button>
                            <canvas id="canvas" class="hidden"></canvas>
                            <input value="{{ old('foto') }}" type="hidden" name="foto" id="foto">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-[rgb(7,38,68)] hover:bg-[rgb(7,58,88)] text-white py-3 rounded-lg font-semibold transition transform hover:scale-105 duration-300">
                        Submit
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[rgb(222,170,21)] text-white py-6">
        <div class="text-center">
            <p>&copy; {{ date('Y') }} SMK-SMTI Pontianak. All rights reserved.</p>
        </div>
    </footer>

    <script>
        @if(session('success'))
        alert("{{ session('success') }}");
        @endif
    </script>

    <script>
        //**************************** CAPTURE CAMERA **************************
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    const video = document.getElementById('video');
                    video.srcObject = stream;
                    video.play();
                    video.style.transform = 'scaleX(-1)';
                })
                .catch(function (error) {
                    console.error("Error accessing the camera: ", error);
                });
        }

        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        const video = document.getElementById('video');

        canvas.width = 720;
        canvas.height = 540;

        document.getElementById('snap').addEventListener('click', function () {
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const dataURL = canvas.toDataURL('image/png');
            document.getElementById('foto').value = dataURL;

            alert('Thank you, your photo captured successfully!');
        });

        //**************************** CAPTURE CAMERA **************************

    </script>

@endsection
