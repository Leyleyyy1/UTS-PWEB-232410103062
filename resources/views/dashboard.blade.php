@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex flex-col md:flex-row items-center justify-between bg-gray-50 p-6 rounded-lg mb-8">
        <div class="flex items-center space-x-6">
            <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Image" class="w-32 h-32 object-contain">
            <div>
                <p class="text-lg text-gray-500">Welcome Back</p>
                <h1 class="text-2xl font-bold text-blue-900">{{ $username }}!</h1>
                <p class="text-gray-600 mt-2 max-w-md">
                    Selamat datang kembali di dashboard konser Anda. Di sini Anda bisa melihat statistik penjualan tiket dan performa konser terbaru Anda.
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-pink-100 p-4 rounded-lg text-center shadow">
            <p class="text-gray-700 text-sm">Tiket Hari Ini</p>
            <p class="text-xl font-bold text-pink-700">{{ $dashboardData['total_tickets_sold_today'] }}</p>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg text-center shadow">
            <p class="text-gray-700 text-sm">Total Tiket</p>
            <p class="text-xl font-bold text-blue-700">{{ $dashboardData['total_tickets_sold'] }}</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg text-center shadow">
            <p class="text-gray-700 text-sm">Penjualan Hari Ini</p>
            <p class="text-xl font-bold text-gray-800">Rp {{ number_format($dashboardData['total_sales_today'], 0, ',', '.') }}</p>
        </div>
        <div class="bg-pink-100 text-gray p-4 rounded-lg text-center shadow">
            <p class="text-sm">Total Penjualan</p>
            <p class="text-xl font-bold text-pink-700">Rp {{ number_format($dashboardData['total_sales'], 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-8">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Konser yang Akan Datang</h3>
        <div class="flex items-center space-x-6">

            <img src="{{ Asset($concertData['foto']) }}" alt="Foto Konser" class="w-60 h-40 object-cover rounded-lg">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">{{ $concertData['concert_name'] }}</h2>
                <p class="text-gray-600"><strong>Tanggal:</strong> {{ $concertData['concert_date'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Penjualan Tiket per Tipe</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm">
                <thead>
                    <tr class="bg-pink-100 text-gray-700">
                        <th class="px-4 py-2 text-left">Tipe Tiket</th>
                        <th class="px-4 py-2 text-left">Terjual</th>
                        <th class="px-4 py-2 text-left">Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dashboardData['tickets'] as $ticket)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium text-gray-800">{{ strtoupper($ticket['type']) }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $ticket['sold'] }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $ticket['available'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
