@extends('layouts.admin')
@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan Website')

@section('content')

<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf @method('PUT')

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">
            <h3 class="font-semibold text-gray-800 pb-3 border-b border-gray-100">
                Informasi Umum
            </h3>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Desa *</label>
                <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tagline</label>
                <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? '' }}"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Kantor *</label>
                <textarea name="address" rows="2"
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-none">{{ $settings['address'] ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telepon *</label>
                    <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email" value="{{ $settings['email'] ?? '' }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nomor WhatsApp Admin *
                    <span class="text-gray-400 font-normal">(format: 628xxxxx tanpa +)</span>
                </label>
                <input type="text" name="whatsapp_number"
                       value="{{ $settings['whatsapp_number'] ?? '' }}"
                       placeholder="62895634707159"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jam Pelayanan *</label>
                <input type="text" name="office_hours" value="{{ $settings['office_hours'] ?? '' }}"
                       placeholder="Senin - Jumat: 08.00 - 15.00 WIB"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    URL Embed Google Maps
                </label>
                <textarea name="maps_embed_url" rows="3"
                          placeholder="Paste URL embed dari Google Maps (src iframe)..."
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-none font-mono text-xs">{{ $settings['maps_embed_url'] ?? '' }}</textarea>
                <p class="text-xs text-gray-400 mt-1">
                    Cara mendapatkan: Google Maps → Share → Embed a map → salin URL dari src="..."
                </p>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-[#012d1d] text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                Simpan Pengaturan
            </button>
        </div>

    </form>
</div>

@endsection