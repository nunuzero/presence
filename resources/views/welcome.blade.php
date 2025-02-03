<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presence</title>
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes scanning {
            0% {
                top: 0%;
            }
            50% {
                top: 100%;
            }
            100% {
                top: 0%;
            }
        }

        .scanner-overlay {
            position: absolute;
            top: -20%;
            left: 0;
            width: 100%;
            height: 20px;
            background: skyblue;
            border: 1px solid black;
            animation: scanning 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="relative min-h-screen bg-black bg-cover bg-center"
    @if(file_exists(public_path("storage/img/login-bg.jpg"))) 
        style="background-image: url('{{ asset('storage/img/login-bg.jpg') }}');"
    @endif>

    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-gray-800 bg-opacity-90 text-white rounded-xl shadow-lg p-6 w-full max-w-4xl flex">
            <div class="flex-1 pr-4 flex flex-col">
                @php
                    $logoPath = null;
                    foreach (['png', 'jpg', 'jpeg', 'svg', 'webp'] as $ext) {
                        if (file_exists(public_path("storage/img/logo.$ext"))) {
                            $logoPath = asset("storage/img/logo.$ext");
                            break;
                        }
                    }
                @endphp

                <br class="m-4">
                <div class="mb-4">
                    @if ($logoPath)
                        <img src="{{ $logoPath }}" alt="Logo" class="h-16 mx-auto">
                    @else
                        <span class="font-bold text-2xl">Presence</span>
                    @endif
                </div>
                <br class="m-4">

                <h2 class="text-xl font-bold text-center">Presensi Dengan Kartu Tanda Pengenal</h2>
                <p class="text-sm text-gray-300 mt-1 text-center">Arahkan bagian QR Code pada kartu pengenal anda ke kamera untuk melakukan presensi</p>

                <div class="grow"></div>
                <br class="m-4">
                <div class="mt-4 text-lg font-semibold self-start">
                    <p>Hasil: <span id="result" class="text-green-400"></span></p>
                </div>
                <br class="m-4">
                
                <div class="mt-4 p-3 bg-red-300 text-black font-bold text-center rounded">
                    Untuk saat ini, fitur ini hanya bisa digunakan jika diakses lewat localhost atau dengan ngrok
                </div>
            </div>

            <div class="border-l border-gray-600 mx-4"></div>

            <div class="flex-1 flex flex-col relative">
                <div class="scanner-overlay"></div>

                <div class="mt-4 flex-1">
                    <video id="video" class="w-full h-96 rounded-lg border border-gray-700"></video>
                </div>
            </div>
        </div>
    </div>

    <script>
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const videoElement = document.getElementById('video');
        const resultElement = document.getElementById('result');

        codeReader
            .getVideoInputDevices()
            .then(videoInputDevices => {
                if (videoInputDevices.length > 0) {
                    const selectedDeviceId = videoInputDevices[0].deviceId;
                    codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
                        if (result) {
                            resultElement.textContent = result.text;
                        }
                        if (err && !(err instanceof ZXing.NotFoundException)) {
                            console.error(err);
                        }
                    });
                } else {
                    console.error('No video input devices found');
                }
            })
            .catch(err => console.error(err));
    </script>

</body>
</html>
