@extends('layouts.admin')
@section('title', 'Profil Desa')
@section('page-title', 'Kelola Profil Desa')

@section('content')

<div class="space-y-8">

    {{-- ============= INFORMASI DESA ============= --}}
    <form method="POST" action="{{ route('admin.village.update-profile') }}"
          enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">
            <h3 class="font-semibold text-gray-800 pb-3 border-b border-gray-100">Informasi Desa</h3>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Desa *</label>
                    <input type="text" name="village_name"
                           value="{{ old('village_name', $profile->village_name) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kepala Desa</label>
                    <input type="text" name="head_of_village"
                           value="{{ old('head_of_village', $profile->head_of_village) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                    <input type="text" name="subdistrict"
                           value="{{ old('subdistrict', $profile->subdistrict) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kabupaten</label>
                    <input type="text" name="regency"
                           value="{{ old('regency', $profile->regency) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
                    <input type="text" name="province"
                           value="{{ old('province', $profile->province) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Pos</label>
                    <input type="text" name="postal_code"
                           value="{{ old('postal_code', $profile->postal_code) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Berdiri</label>
                    <input type="number" name="established_year"
                           value="{{ old('established_year', $profile->established_year) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto Hero</label>
                    <input type="file" name="hero_image" accept="image/*"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-green-50 file:text-green-700"/>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                <textarea name="description" rows="2"
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-none">{{ old('description', $profile->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sejarah Desa</label>
                <textarea name="history" rows="5"
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-y">{{ old('history', $profile->history) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
                <textarea name="vision" rows="3"
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-none">{{ old('vision', $profile->vision) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Misi</label>
                <textarea name="mission" rows="4"
                          placeholder="Satu misi per baris..."
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-y">{{ old('mission', $profile->mission) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-[#012d1d] text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                    Simpan Profil
                </button>
            </div>
        </div>
    </form>

    {{-- ============= PERANGKAT DESA ============= --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
            <h3 class="font-semibold text-gray-800">Perangkat Desa</h3>
        </div>

        {{-- Daftar Perangkat --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            @foreach($officials as $official)
            <div class="border border-gray-100 rounded-lg p-4 flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden shrink-0 flex items-center justify-center">
                    @if($official->photo)
                        <img src="{{ Storage::url($official->photo) }}"
                             class="w-full h-full object-cover"/>
                    @else
                        <span class="material-symbols-outlined text-gray-400">person</span>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-gray-800 text-sm truncate">{{ $official->name }}</p>
                    <p class="text-xs text-gray-500">{{ $official->position }}</p>
                </div>
                <form method="POST" action="{{ route('admin.village.destroy-official', $official) }}"
                      onsubmit="return confirm('Hapus perangkat ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <span class="material-symbols-outlined text-base">close</span>
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        {{-- Form Tambah --}}
        <form method="POST" action="{{ route('admin.village.store-official') }}"
              enctype="multipart/form-data"
              class="border-t border-gray-100 pt-4">
            @csrf
            <p class="text-sm font-medium text-gray-700 mb-3">Tambah Perangkat Baru</p>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <input type="text" name="name" placeholder="Nama" required
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                <input type="text" name="position" placeholder="Jabatan" required
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                <input type="number" name="order" placeholder="Urutan" value="0" min="0"
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                <input type="file" name="photo" accept="image/*"
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-green-50 file:text-green-700"/>
            </div>
            <div class="mt-3">
                <button type="submit"
                        class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                    Tambah Perangkat
                </button>
            </div>
        </form>
    </div>

    {{-- ============= STATISTIK DESA ============= --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
            <h3 class="font-semibold text-gray-800">Statistik Desa</h3>
        </div>

        {{-- Daftar Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mb-6">
            @foreach($statistics as $stat)
            <div class="border border-gray-100 rounded-lg p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-green-700 text-base">{{ $stat->icon ?? 'bar_chart' }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-gray-800 text-sm">{{ $stat->value }} {{ $stat->unit }}</p>
                    <p class="text-xs text-gray-500">{{ $stat->label }}</p>
                </div>
                <form method="POST" action="{{ route('admin.village.destroy-statistic', $stat) }}"
                      onsubmit="return confirm('Hapus statistik ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <span class="material-symbols-outlined text-base">close</span>
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        {{-- Form Tambah --}}
        <form method="POST" action="{{ route('admin.village.store-statistic') }}"
              class="border-t border-gray-100 pt-4">
            @csrf
            <p class="text-sm font-medium text-gray-700 mb-3">Tambah Statistik Baru</p>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                <input type="text" name="label" placeholder="Label (mis: Penduduk)" required
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                <input type="text" name="value" placeholder="Nilai (mis: 3.542)" required
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                <input type="text" name="unit" placeholder="Satuan (mis: jiwa)"
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                <input type="text" name="icon" placeholder="Icon (mis: groups)" value="bar_chart"
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                <input type="number" name="order" placeholder="Urutan" value="0" min="0"
                       class="border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>
            <div class="mt-3">
                <button type="submit"
                        class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                    Tambah Statistik
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
