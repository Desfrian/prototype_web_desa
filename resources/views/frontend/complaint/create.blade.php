@extends('layouts.frontend')

@section('title', 'Pengaduan Warga')

@section('content')

<div class="pt-[100px] py-xl">
    <div class="max-w-container-max mx-auto px-gutter">

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-outline-variant/20">
            <div class="flex flex-col md:flex-row">

                {{-- Panel Kiri: Info --}}
                <div class="w-full md:w-2/5 bg-primary p-lg text-on-primary relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary-container rounded-full -mr-24 -mt-24 opacity-20"></div>
                    <h2 class="font-headline-md text-headline-md mb-md relative z-10">
                        Layanan Pengaduan Masyarakat
                    </h2>
                    <p class="font-body-md opacity-80 mb-xl relative z-10">
                        Sampaikan saran, keluhan, atau laporan Anda untuk desa yang lebih baik.
                        Kami merespons setiap masukan dalam waktu maksimal 2×24 jam.
                    </p>
                    <div class="space-y-lg relative z-10">
                        <div class="flex items-start gap-md">
                            <span class="material-symbols-outlined shrink-0">call</span>
                            <span class="font-body-md">+62 812-3456-7890</span>
                        </div>
                        <div class="flex items-start gap-md">
                            <span class="material-symbols-outlined shrink-0">mail</span>
                            <span class="font-body-md">kontak@desa-amanah.id</span>
                        </div>
                        <div class="flex items-start gap-md">
                            <span class="material-symbols-outlined shrink-0">location_on</span>
                            <span class="font-body-md">Jl. Gotong Royong No. 1, Desa Amanah</span>
                        </div>
                        <div class="flex items-start gap-md">
                            <span class="material-symbols-outlined shrink-0">schedule</span>
                            <span class="font-body-md">Senin - Jumat: 08.00 - 15.00 WIB</span>
                        </div>
                    </div>
                    <div class="mt-xl pt-xl border-t border-white/20 relative z-10">
                        <p class="text-sm opacity-70 mb-sm">Setelah mengirim form, kamu akan diarahkan ke WhatsApp untuk konfirmasi.</p>
                        <div class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-green-400">verified</span>
                            <span class="text-sm">Pengaduan tersimpan & terkirim ke admin</span>
                        </div>
                    </div>
                </div>

                {{-- Panel Kanan: Form --}}
                <div class="w-full md:w-3/5 p-lg">
                    <h3 class="font-title-lg text-title-lg text-primary mb-lg">
                        Isi Form Pengaduan
                    </h3>

                    @if($errors->any())
                    <div class="mb-md bg-error-container text-on-error-container px-md py-sm rounded-lg">
                        <ul class="list-disc list-inside text-sm space-y-xs">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('complaint.store') }}" class="space-y-md">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                            <div>
                                <label class="block font-label-md text-on-surface-variant mb-xs">
                                    Nama Lengkap <span class="text-error">*</span>
                                </label>
                                <input type="text"
                                       name="sender_name"
                                       value="{{ old('sender_name') }}"
                                       placeholder="Masukkan nama lengkap"
                                       class="w-full px-md py-sm rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all @error('sender_name') border-error @enderror"/>
                            </div>
                            <div>
                                <label class="block font-label-md text-on-surface-variant mb-xs">
                                    Nomor HP / WhatsApp <span class="text-error">*</span>
                                </label>
                                <input type="text"
                                       name="sender_phone"
                                       value="{{ old('sender_phone') }}"
                                       placeholder="Contoh: 081234567890"
                                       class="w-full px-md py-sm rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all @error('sender_phone') border-error @enderror"/>
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-md text-on-surface-variant mb-xs">
                                Alamat / Dusun
                            </label>
                            <input type="text"
                                   name="sender_address"
                                   value="{{ old('sender_address') }}"
                                   placeholder="Contoh: Dusun Wetan RT 02/RW 01"
                                   class="w-full px-md py-sm rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"/>
                        </div>

                        <div>
                            <label class="block font-label-md text-on-surface-variant mb-xs">
                                Kategori Pengaduan <span class="text-error">*</span>
                            </label>
                            <select name="complaint_category_id"
                                    class="w-full px-md py-sm rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all @error('complaint_category_id') border-error @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ old('complaint_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-label-md text-on-surface-variant mb-xs">
                                Isi Pengaduan <span class="text-error">*</span>
                            </label>
                            <textarea name="content"
                                      rows="5"
                                      placeholder="Ceritakan pengaduan atau saran Anda secara detail..."
                                      class="w-full px-md py-sm rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all resize-none @error('content') border-error @enderror">{{ old('content') }}</textarea>
                            <p class="text-caption text-outline mt-xs">Minimal 20 karakter</p>
                        </div>

                        <button type="submit"
                                class="w-full bg-secondary text-on-secondary py-md rounded-lg font-title-lg shadow-md hover:bg-secondary/90 hover:-translate-y-1 transition-all flex items-center justify-center gap-sm">
                            <span class="material-symbols-outlined">send</span>
                            Kirim Pengaduan via WhatsApp
                        </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection