@extends('layouts.app')

@section('title', 'Organisasi dan Tata Kelola - FIKES Universitas dr. Soebandi')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16" x-data="{ zoomOpen: false }">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- Header Halaman -->
        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Profil Institusi
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                {{ $struktur->judul ?? 'Organisasi dan Tata Kelola' }}
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                Fakultas Ilmu Kesehatan Universitas dr. Soebandi
            </p>
        </div>

        @php
            $rawGambar = null;
            if (isset($struktur) && $struktur) {
                $rawGambar = $struktur->gambar ?? $struktur->foto ?? $struktur->image ?? null;
                if (!$rawGambar) {
                    foreach ($struktur->getAttributes() as $k => $v) {
                        if ($v && preg_match('/\.(jpg|jpeg|png|webp|svg)$/i', (string) $v)) {
                            $rawGambar = $v;
                            break;
                        }
                    }
                }
            }
            $imgUrl = $rawGambar 
                ? (str_starts_with($rawGambar, 'http') ? $rawGambar : asset('storage/' . ltrim($rawGambar, '/'))) 
                : null;
        @endphp

        <!-- Kontainer Gambar Bagan -->
        @if($imgUrl)
            <div class="bg-white rounded-3xl border border-gray-200/80 shadow-md p-4 sm:p-8 overflow-hidden">
                <div class="relative group cursor-zoom-in rounded-2xl overflow-hidden bg-slate-50 flex items-center justify-center"
                     @click="zoomOpen = true">
                    
                    <img src="{{ $imgUrl }}" 
                         alt="{{ $struktur->judul ?? 'Bagan Struktur Organisasi' }}" 
                         class="w-full h-auto max-h-[85vh] object-contain mx-auto transition-transform duration-300 group-hover:scale-[1.01]">

                    <!-- Badge Klik Perbesar -->
                    <div class="absolute bottom-4 right-4 bg-black/65 backdrop-blur-xs text-white text-xs font-medium px-4 py-2 rounded-full flex items-center gap-2 opacity-85 group-hover:opacity-100 transition-opacity shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                        <span>Klik gambar untuk memperbesar</span>
                    </div>
                </div>

                <!-- Tombol Buka/Unduh Resolusi Penuh -->
                <div class="mt-4 flex justify-end">
                    <a href="{{ $imgUrl }}" target="_blank" download class="inline-flex items-center gap-1.5 text-xs font-bold text-[#7A1C28] hover:underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span>Unduh / Lihat Gambar Ukuran Asli</span>
                    </a>
                </div>
            </div>

            <!-- Lightbox Modal Layar Penuh (Diteleport langsung ke Body agar menutup Navbar 100%) -->
            <template x-teleport="body">
                <div x-show="zoomOpen" 
                     x-cloak
                     x-transition.opacity
                     style="z-index: 999999; display: none;"
                     class="fixed inset-0 top-0 left-0 w-screen h-screen bg-black/90 backdrop-blur-sm flex items-center justify-center p-4 sm:p-6"
                     @keydown.escape.window="zoomOpen = false">
                    
                    <!-- Tombol Tutup (X) -->
                    <button @click="zoomOpen = false" 
                            type="button"
                            class="fixed top-5 right-5 sm:top-7 sm:right-7 w-11 h-11 rounded-full bg-white/15 hover:bg-[#7A1C28] text-white flex items-center justify-center transition-colors shadow-lg cursor-pointer"
                            style="z-index: 1000000;">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>

                    <!-- Area Gambar Zoom -->
                    <div class="w-full h-full flex items-center justify-center overflow-auto" @click.self="zoomOpen = false">
                        <img src="{{ $imgUrl }}" 
                             alt="{{ $struktur->judul ?? 'Bagan Struktur Organisasi' }}" 
                             class="w-auto h-auto max-w-[95vw] max-h-[92vh] object-contain rounded-xl shadow-2xl">
                    </div>
                </div>
            </template>
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-gray-200/80 max-w-lg mx-auto shadow-xs space-y-2">
                <svg class="w-10 h-10 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-gray-500 text-sm font-medium">Gambar bagan struktur organisasi belum diunggah pada panel admin.</p>
            </div>
        @endif

    </div>
</main>
@endsection