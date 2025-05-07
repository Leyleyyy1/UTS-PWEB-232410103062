@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')

<div class="bg-white shadow-md rounded-xl p-6 mb-8">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-800">Konser Terdekatmu</h1>
        <a href="#" title="Edit Konser">
            <img src="{{ asset('images/edit.png') }}" alt="Edit" class="w-6 h-6">
        </a>
    </div>
    <div class="flex items-center gap-6 mt-4">
        <img src="{{ Asset($concertData['foto']) }}" alt="{{ $concertData['concert_name'] }}"
             class="w-56 h-36 object-cover rounded-lg shadow-md">
        <div>
            <h2 class="text-2xl font-semibold text-gray-900">{{ $concertData['concert_name'] }}</h2>
            <p class="text-gray-600 mt-1">{{ $concertData['venue'] }} — 
                {{ \Carbon\Carbon::parse($concertData['concert_date'])->format('d M Y') }}</p>
        </div>
    </div>
</div>

<div class="bg-white shadow-md rounded-xl p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Artis</h2>
        <a href="#" class="text-white bg-pink-300 hover:bg-pink-700 rounded-full w-8 h-8 flex items-center justify-center text-xl font-bold shadow" title="Tambah Artis">
            +
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($concertData['artists'] as $artist)
        <div class="bg-gray-50 rounded-lg shadow p-4 flex flex-col items-center text-center">
            <img src="{{ Asset($artist['photo']) }}" alt="{{ $artist['name'] }}"
                 class="w-28 h-28 object-cover rounded-full shadow mb-3">
            <h3 class="font-semibold text-gray-800">{{ $artist['name'] }}</h3>
            <p class="text-sm text-gray-500 mt-1">Jam tampil: {{ $artist['performance_time'] }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="bg-white shadow-md rounded-xl p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Tiket</h2>
        <a href="#" class="text-white bg-pink-300 hover:bg-pink-700 rounded-full w-8 h-8 flex items-center justify-center text-xl font-bold shadow" title="Tambah Tiket">
            +
        </a>
    </div>
    <div class="space-y-4">
        @foreach ($dashboardData['tickets'] as $ticket)
        <div class="flex items-center justify-between bg-gray-50 rounded-lg p-4 shadow-sm">
            <div>
                <h3 class="text-lg font-semibold capitalize text-gray-800">{{ $ticket['type'] }}</h3>
                <p class="text-sm text-gray-500 mt-1">Terjual: {{ $ticket['sold'] }} | Tersedia: {{ $ticket['available'] }}</p>
            </div>
            <a href="#" title="Edit Tiket">
                <img src="{{ asset('images/edit.png') }}" alt="Edit" class="w-5 h-5">
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
