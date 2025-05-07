<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concerta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative h-screen w-screen m-0 p-0">

    <div class="absolute inset-0">
        <img src="{{ asset('images/awalan.png') }}" alt="Background" class="object-cover w-full h-full">
        <div class="absolute inset-0 bg-black bg-opacity-70"></div>
    </div>

    <div class="absolute top-6 left-8 flex items-center z-10">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 mr-3">
        <h1 class="text-white text-2xl font-semibold">Concerta</h1>
    </div>

    <div class="absolute inset-0 flex flex-col items-center justify-center text-center z-10 px-6">
        <h2 class="text-white text-5xl font-bold mb-6 leading-tight drop-shadow-lg">
            Selamat Datang di Concerta
        </h2>
        <p class="text-gray-200 text-xl max-w-3xl mb-4 leading-relaxed drop-shadow">
            Platform manajemen konser terintegrasi untuk para penyelenggara yang profesional.
            Atur jadwal, artis, tiket, dan informasi konser Anda dengan efisien dan terpercaya.
        </p>
        <a href="{{ route('login') }}"
        class="bg-white hover:bg-gray-200 text-black text-lg px-8 py-3 rounded-md font-medium shadow-lg transition">
         Masuk
     </a>
     
    </div>

</body>
</html>
