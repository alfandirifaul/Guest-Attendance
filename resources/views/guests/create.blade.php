@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mt-5">Guest Attendance</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('guests.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="asal_instansi">Asal Instansi:</label>
                <input type="text" name="asal_instansi" id="asal_instansi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tujuan">Tujuan:</label>
                <input type="text" name="tujuan" id="tujuan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nomor_hp">Nomor HP:</label>
                <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" required>
            </div>

            <div class="form-group" id="camera">
                <label for="foto">Foto:</label>
                <div>
                    <video id="video" width="320" height="240" autoplay></video>
                </div>
                <button type="button" id="snap" class="btn btn-primary mt-2">Capture Photo</button>
                <canvas id="canvas" width="320" height="240"></canvas>
                <input type="hidden" name="foto" id="foto">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
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

