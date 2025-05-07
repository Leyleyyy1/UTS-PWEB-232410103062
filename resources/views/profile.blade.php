@extends('layouts.app')
@section('title', 'profile')

@section('content')
<div class="bg-gradient-to-r from-gray-800 to-purple-800 p-8 rounded-t-lg text-white relative shadow-lg">
    <h1 class="text-3xl font-semibold">Profile</h1>
    <button onclick="document.getElementById('editForm').scrollIntoView({ behavior: 'smooth' });" 
        class="absolute top-4 right-4 bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded-full shadow-md transition-all duration-300 ease-in-out transform hover:scale-105">
        <img src="{{ asset('images/edit.png') }}" alt="Edit" class="w-6 h-6">
    </button>
</div>

<div class="flex flex-col md:flex-row p-8 bg-white shadow-lg rounded-b-lg mt-6 space-y-6 md:space-y-0 md:space-x-8">
    <div class="md:w-1/4 bg-gradient-to-r from-purple-100 to-blue-50 p-6 rounded-xl shadow-lg text-center">
        <img src="{{ Asset($user['profile_photo']) }}" alt="Profile Photo" class="w-32 h-32 rounded-full mx-auto mb-4 shadow-md border-4 border-white">
        <h2 class="font-semibold text-xl text-gray-800"> <span class="font-bold">{{ session('username') }}</h2>
        <p class="text-sm text-gray-500">{{ $user['organizer'] ?? 'Your Company' }}</p>

        <div class="mt-6 text-sm text-left text-gray-700 space-y-2">
            <p>Pengikut         : <span class="font-bold">{{ number_format($user['followers']) }}</span></p>
            <p>Komentar         : <span class="font-bold">{{ number_format($user['comments']) }}</span></p>
            <p>Tayangan profil  : <span class="font-bold">{{ number_format($user['profile_views']) }}</span></p>
        </div>

        <div class="mt-6 text-sm text-left text-gray-600">
            <p><strong>Instagram     :</strong> {{ $user['instagram'] }}</p>
            <p><strong>Twitter       :</strong> {{ $user['twitter'] }}</p>
            <p><strong>YouTube       :</strong> {{ $user['youtube'] }}</p>
        </div>

        <button onclick="confirmLogout()" class="mt-8 bg-red-800 hover:bg-red-800 text-white px-6 py-3 rounded-xl shadow-md w-full transition-all duration-300 ease-in-out">
            Logout
        </button>
    </div>

    <div class="md:w-3/4 bg-gradient-to-r from-purple-50 to-blue-50 p-6 rounded-xl shadow-lg" id="editForm">
        <form action="" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input name="phone" value="{{ old('phone', $user['phone']) }}" class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input name="email" value="{{ old('email', $user['email']) }}" class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Instagram</label>
                    <input name="instagram" value="{{ old('instagram', $user['instagram']) }}" class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Twitter</label>
                    <input name="twitter" value="{{ old('twitter', $user['twitter']) }}" class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">YouTube</label>
                    <input name="youtube" value="{{ old('youtube', $user['youtube']) }}" class="w-full border-2 border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <button type="submit" class="bg-gray-800 hover:bg-gray-800 text-white px-6 py-3 rounded-xl shadow-md w-full transition-all duration-300 ease-in-out">
                Simpan
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin keluar?',
            text: "Kamu akan keluar dari akun ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}";
            }
        });
    }
</script>
@endsection
