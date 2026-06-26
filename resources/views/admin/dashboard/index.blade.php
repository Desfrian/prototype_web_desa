@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Kartu Statistik --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-green-700">newspaper</span>
            </div>
            <span class="text-caption text-gray-400">Total</span>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $stats['total_news'] }}</p>
        <p class="text-sm text-gray-500 mt-1">Berita
            <span class="text-green-600 font-medium">({{ $stats['published_news'] }} published)</span>
        </p>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-red-600">inbox</span>
            </div>
            <span class="text-caption text-gray-400">Total</span>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $stats['total_complaints'] }}</p>
        <p class="text-sm text-gray-500 mt-1">Pengaduan
            @if($stats['new_complaints'] > 0)
            <span class="bg-red-100 text-red-600 text-xs font-medium px-2 py-0.5 rounded-full ml-1">
                {{ $stats['new_complaints'] }} baru
            </span>
            @endif
        </p>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <span class="material-symbols-outlined text-blue-600">travel_explore</span>
            </div>
            <span class="text-caption text-gray-400">Total</span>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $stats['total_tourism'] }}</p>
        <p class="text-sm text-gray-500 mt-1">Destinasi Wisata</p>
    </div>

</div>

{{-- Tabel terbaru --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Pengaduan Terbaru --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">Pengaduan Terbaru</h3>
            <a href="{{ route('admin.complaints.index') }}"
               class="text-sm text-green-700 hover:underline">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($latestComplaints as $complaint)
            <div class="p-4 flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-sm text-gray-500">person</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $complaint->sender_name }}</p>
                    <p class="text-xs text-gray-500">{{ $complaint->category->name ?? '-' }}</p>
                </div>
                <span class="text-xs px-2 py-1 rounded-full shrink-0
                    {{ $complaint->status === 'baru' ? 'bg-red-100 text-red-600' :
                       ($complaint->status === 'diproses' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                    {{ $complaint->status }}
                </span>
            </div>
            @empty
            <div class="p-6 text-center text-gray-400 text-sm">
                Belum ada pengaduan masuk
            </div>
            @endforelse
        </div>
    </div>

    {{-- Berita Terbaru --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-semibold text-gray-800">Berita Terbaru</h3>
            <a href="{{ route('admin.news.index') }}"
               class="text-sm text-green-700 hover:underline">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($latestNews as $item)
            <div class="p-4 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-sm text-green-700">article</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $item->title }}</p>
                    <p class="text-xs text-gray-500">{{ $item->category }}</p>
                </div>
                <span class="text-xs px-2 py-1 rounded-full shrink-0
                    {{ $item->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                    {{ $item->status }}
                </span>
            </div>
            @empty
            <div class="p-6 text-center text-gray-400 text-sm">
                Belum ada berita
            </div>
            @endforelse
        </div>
    </div>

</div>

@endsection