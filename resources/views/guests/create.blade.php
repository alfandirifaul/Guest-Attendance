@extends('layouts.app')

@section('content')

    <!-- Navigation Bar -->
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

    <!-- Form Section -->
    <div id="form" class="px-10 py-20 bg-gray-50">
        <div class="mb-10 flex justify-center items-center">
            <h1 class="text-slate-700 font-bold text-4xl">Guest Attendance</h1>
        </div>



        <!-- Form -->
        <form class="bg-white shadow-md rounded-lg p-8 space-y-6 max-w-3xl mx-auto" method="POST" action="{{ route('guests.store') }}">
            @csrf
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

            <!-- Nomor HP -->
            <div class="flex flex-col">
                <label for="nomor_hp" class="text-lg font-semibold text-gray-700 mb-2">Nomor HP:</label>
                <x-text-input value="{{ old('nomor_hp') }}" type="number" name="nomor_hp" id="nomor_hp" class="form-input p-3 border border-gray-300 rounded-lg" required />
                @error('nomor_hp')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Capture Photo -->
            <div class="flex flex-col">
                <label for="foto" class="text-lg font-semibold text-gray-700 mb-4">Capture Photo:</label>
                <div class="flex justify-center">
                    <video id="video" class="rounded-md border" width="1080" height="240" autoplay></video>
                </div>
                @error('foto')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
                <button type="button" id="snap"
                        class="mt-4 bg-[rgb(222,170,21)] hover:bg-[rgb(222,200,51)] text-white py-2 px-6 rounded-lg shadow-md transition duration-300">
                    Capture Photo
                </button>
                <canvas id="canvas" class="hidden"></canvas>
                <input value="{{ old('foto') }}" type="hidden" name="foto" id="foto">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full bg-[rgb(7,38,68)] hover:bg-[rgb(7,58,88)] text-white py-3 rounded-lg font-semibold transition transform hover:scale-105 duration-300">
                Submit
            </button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-[rgb(7,38,68)] text-white py-6 mt-20">
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
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    const video = document.getElementById('video');
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function (error) {
                    console.error("Error accessing the camera: ", error);
                });
        }

        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        const video = document.getElementById('video');

        canvas.width = 640;
        canvas.height = 480;

        document.getElementById('snap').addEventListener('click', function () {
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const dataURL = canvas.toDataURL('image/png');
            document.getElementById('foto').value = dataURL;

            alert('Photo captured successfully!');
        });
    </script>

@endsection
