<nav class="bg-gray-800 text-white p-4 flex justify-between">
    <div class="flex items-center">
        <button id="burger-menu" class="text-gray-400 hover:text-white focus:outline-none">
            <img src="{{ asset('images/burger.png') }}" alt="Menu" class="h-6 w-6">
        </button>
    </div>

    <div class="flex items-center ml-4">
        <img src="{{ asset('images/logo.png') }}" alt="Concerta Logo" class="h-10 w-10">
        <span class="text-white text-xl font-bold ml-2">Concerta</span>
    </div>

    <div class="flex items-center space-x-2">
        <img src="{{ asset('images/user.png') }}" alt="User Profile" class="h-8 w-8 rounded-full">
        <a href="{{ route('profile') }}" class="text-white font-semibold">
            {{ session('username') ?? 'Guest' }}
        </a>
    </div>
</nav>
