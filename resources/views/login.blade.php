<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Concerta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex flex-col">

    <div class="flex items-center justify-center px-8 py-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 mr-3">
        <h1 class="text-2xl text-white font-bold">Concerta</h1>
    </div>

    <div class="flex flex-1 items-center justify-center">
        
        <div class="w-1/2 flex flex-col items-center">
            <img src="{{ asset('images/festival.png') }}" alt="Festival" class="w-[320px] h-[320px] object-cover translate-x-4">
            <div class="text-center mt-2">
                <h2 class="text-2xl font-bold text-white mb-1">Masuk untuk kelola konsermu!</h2>
                <p class="text-gray-300 text-sm">Jadilah penyelenggara konser musik dengan mudah dan profesional melalui Concerta.</p>
            </div>
        </div>

        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-white mb-6 text-center">Concerta Login </h2>

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf 
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-300">Username</label>
                    <input type="text" name="username" id="username" required
                           class="mt-1 w-full border border-gray-600 bg-gray-700 text-white px-4 py-2 rounded-md focus:outline-none focus:ring focus:border-blue-400" />
                </div>
            
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" name="password" id="password" required
                           class="mt-1 w-full border border-gray-600 bg-gray-700 text-white px-4 py-2 rounded-md focus:outline-none focus:ring focus:border-blue-400" />
                </div>
            
                <div>
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md font-semibold">
                        Login
                    </button>
                </div>
            </form>
            
            
            
        </div>

    </div>

</body>
</html>
