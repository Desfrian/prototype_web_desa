@extends('layouts.admin')
@section('title', 'Detail Pengaduan')
@section('page-title', 'Detail Pengaduan')

@section('content')

<div class="max-w-2xl space-y-6">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4 pb-3 border-b border-gray-100">
            Informasi Pengirim
        </h3>
        <dl class="space-y-3 text-sm">
            <div class="flex gap-4">
                <dt class="w-32 text-gray-500 shrink-0">Nama</dt>
                <dd class="text-gray-800 font-medium">{{ $complaint->sender_name }}</dd>
            </div>
            <div class="flex gap-4">
                <dt class="w-32 text-gray-500 shrink-0">No HP</dt>
                <dd>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $complaint->sender_phone) }}"
                       target="_blank"
                       class="text-green-700 hover:underline">
                        {{ $complaint->sender_phone }}
                    </a>
                </dd>
            </div>
            <div class="flex gap-4">
                <dt class="w-32 text-gray-500 shrink-0">Alamat</dt>
                <dd class="text-gray-800">{{ $complaint->sender_address ?? '-' }}</dd>
            </div>
            <div class="flex gap-4">
                <dt class="w-32 text-gray-500 shrink-0">Kategori</dt>
                <dd class="text-gray-800">{{ $complaint->category->name ?? '-' }}</dd>
            </div>
            <div class="flex gap-4">
                <dt class="w-32 text-gray-500 shrink-0">Dikirim</dt>
                <dd class="text-gray-800">{{ $complaint->created_at->translatedFormat('d F Y, H:i') }} WIB</dd>
            </div>
        </dl>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-3">Isi Pengaduan</h3>
        <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 leading-relaxed">
            {{ $complaint->content }}
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="font-semibold text-gray-800 mb-4">Update Status</h3>
        <form method="POST" action="{{ route('admin.complaints.status', $complaint) }}"
              class="flex gap-3 items-end">
            @csrf @method('PATCH')
            <div class="flex-1">
                <label class="block text-sm text-gray-500 mb-1">Status Saat Ini</label>
                <select name="status"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                    <option value="baru" {{ $complaint->status === 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="diproses" {{ $complaint->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $complaint->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button type="submit"
                    class="bg-[#012d1d] text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                Update Status
            </button>
        </form>
    </div>

    <div class="flex gap-3">
        <a href="{{ route('admin.complaints.index') }}"
           class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
            ← Kembali
        </a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $complaint->sender_phone) }}"
           target="_blank"
           class="bg-green-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors flex items-center gap-2">
            <span class="material-symbols-outlined text-base">chat</span>
            Balas via WhatsApp
        </a>
    </div>

</div>

@endsection
