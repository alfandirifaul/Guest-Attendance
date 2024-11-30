@extends('layouts.app')

@section('content')

    <div class="px-10 py-10">
        <div class="mb-4 flex justify-center items-center">
            <h1 class="text-slate-700 font-bold text-4xl ">Guest Attendance</h1>
        </div>

        @if(session('success'))
            <div class="">{{ session('success') }}</div>
        @endif

        <form class="mt-10" method="POST" action="{{ route('guests.store') }}">
            @csrf
            <div class="text-slate-700 mb-4">
                <div class="font-bold mb-2">
                    <label for="nama">Nama:</label>
                </div>
                <x-text-input type="text" name="nama" id="nama" class="form-control" required/>
            </div>

            <div class="text-slate-700 mb-4">
                <div class="font-bold mb-2">
                    <label for="asal_instansi">Asal Instansi:</label>
                </div>
                <x-text-input type="text" name="asal_instansi" id="asal_instansi" required/>
            </div>

            <div class="text-slate-700 mb-4">
                <div class="font-bold mb-2">
                    <label for="tujuan">Tujuan:</label>
                </div>
                <x-text-input type="text" name="tujuan" id="tujuan" required/>
            </div>

            <div class="text-slate-700 mb-4">
                <div class="mb-2 font-bold ">
                    <label for="nomor_hp">Nomor HP:</label>
                </div>
                <x-text-input type="number" name="nomor_hp" id="nomor_hp" required/>
            </div>

            <div class="text-slate-700 mb-4" id="camera">
                <div class="font-bold mb-2">
                    <label for="foto">Foto:</label>
                </div>
                <div>
                    <video id="video" width="320" height="240" autoplay></video>
                </div>
                <button type="button" id="snap"
                        class="mt-4 w-[320px] border rounded-md border-slate-300 px-2.5 py-1.5 text-center
                               text-sm font-semibold text-black shadow-sm hover:bg-slate-100">
                    Capture Photo
                </button>
                <canvas id="canvas" width="320" height="240"></canvas>
                <input type="hidden" name="foto" id="foto">
            </div>

            <button type="submit"
                    class="w-full border rounded-md border-blue-500 px-2.5 py-1.5 text-center
                    text-sm font-semibold text-black shadow-sm bg-blue-500 hover:bg-blue-600">
                Submit
            </button>
        </form>
    </div>

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

        document.getElementById('snap').addEventListener('click', function () {
            context.drawImage(video, 0, 0, 320, 240);
            const dataURL = canvas.toDataURL('image/png');
            document.getElementById('foto').value = dataURL;
            alert('Photo captured successfully!');
        });
    </script>


@endsection

