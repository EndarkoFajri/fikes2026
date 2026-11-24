@extends('layouts.app')

@section('title', 'Pimpinan Fakultas - FIKES Universitas dr. Soebandi')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16" x-data="{ modalOpen: false, activeImg: '', activeName: '', activeRole: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        <!-- Header Halaman -->
        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Struktur Kepemimpinan
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                Pimpinan Fakultas Ilmu Kesehatan
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                Jajaran Dekanat dan Pimpinan di lingkungan Fakultas Ilmu Kesehatan Universitas dr. Soebandi
            </p>
        </div>

        @if(isset($pimpinans) && $pimpinans->count() > 0)
            
            @php
                // Fungsi helper untuk mendeteksi nama, gelar, jabatan, dan foto secara otomatis dari baris database
                $extractData = function($record) {
                    $attrs = $record->getAttributes();
                    $rawFoto = null;
                    $gelar = null;
                    $nama = null;
                    $jabatan = null;

                    foreach ($attrs as $key => $val) {
                        if ($val === null || $val === '') continue;
                        $k = strtolower($key);

                        if (str_contains($k, 'gelar')) {
                            $gelar = $val;
                        } elseif (str_contains($k, 'jabatan') || str_contains($k, 'posisi') || str_contains($k, 'role')) {
                            $jabatan = $val;
                        } elseif (str_contains($k, 'nama') || str_contains($k, 'name')) {
                            $nama = $val;
                        } elseif (
                            str_contains($k, 'foto') || 
                            str_contains($k, 'gambar') || 
                            str_contains($k, 'image') || 
                            str_contains($k, 'photo') || 
                            str_contains($k, 'avatar') ||
                            preg_match('/\.(jpg|jpeg|png|webp|gif|svg)$/i', (string) $val)
                        ) {
                            $rawFoto = $val;
                        }
                    }

                    $nama = $nama ?: 'Pimpinan Fakultas';
                    $jabatan = $jabatan ?: 'Pimpinan';
                    $namaLengkap = $gelar ? ($nama . ', ' . $gelar) : $nama;

                    $imgUrl = $rawFoto 
                        ? (str_starts_with($rawFoto, 'http') ? $rawFoto : asset('storage/' . ltrim($rawFoto, '/'))) 
                        : 'https://ui-avatars.com/api/?name=' . urlencode($nama) . '&size=600&background=f3f4f6&color=7A1C28';

                    return compact('nama', 'gelar', 'jabatan', 'namaLengkap', 'imgUrl', 'rawFoto');
                };

                $dekanData = $extractData($pimpinans->first());
            @endphp

            <!-- 1. Pimpinan Utama / Dekan (Tengah Atas) -->
            <div class="flex justify-center">
                <div class="w-full max-w-sm bg-white rounded-3xl border border-gray-200/80 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <!-- Foto Dekan -->
                    <div class="relative aspect-[4/5] w-full bg-gray-100 overflow-hidden cursor-pointer"
                         @click="modalOpen = true; activeImg = '{{ $dekanData['imgUrl'] }}'; activeName = '{{ addslashes($dekanData['namaLengkap']) }}'; activeRole = '{{ addslashes($dekanData['jabatan']) }}'">
                        
                        <img src="{{ $dekanData['imgUrl'] }}" 
                             alt="{{ $dekanData['namaLengkap'] }}" 
                             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        
                        <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-5">
                            <span class="text-xs font-semibold text-white bg-black/40 backdrop-blur-sm px-3.5 py-1.5 rounded-full border border-white/20">
                                Klik untuk memperbesar foto
                            </span>
                        </div>
                    </div>

                    <!-- Detail Nama, Gelar & Jabatan Dekan -->
                    <div class="p-6 text-center bg-white relative">
                        <div class="w-12 h-1 bg-[#7A1C28] mx-auto mb-3 rounded-full"></div>
                        <span class="inline-block px-3 py-1 text-[11px] font-bold tracking-wider uppercase text-[#7A1C28] bg-red-50 rounded-full mb-2">
                            {{ $dekanData['jabatan'] }}
                        </span>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 leading-snug">
                            {{ $dekanData['namaLengkap'] }}
                        </h2>
                    </div>
                </div>
            </div>
            
            <!-- 2. Jajaran Wakil Dekan (Selalu Rata Tengah Simetris) -->
            @if($pimpinans->count() > 1)
                <div class="flex flex-wrap justify-center gap-6 sm:gap-8 pt-4">
                    @foreach($pimpinans->skip(1) as $item)
                        @php $itemData = $extractData($item); @endphp

                        <div class="w-full sm:w-[calc(50%-1rem)] lg:w-80 xl:w-96 bg-white rounded-3xl border border-gray-200/80 shadow-sm hover:shadow-xl hover:border-[#7A1C28]/30 transition-all duration-300 overflow-hidden group flex flex-col">
                            <!-- Foto Wakil Dekan -->
                            <div class="relative aspect-[4/5] w-full bg-gray-100 overflow-hidden cursor-pointer"
                                 @click="modalOpen = true; activeImg = '{{ $itemData['imgUrl'] }}'; activeName = '{{ addslashes($itemData['namaLengkap']) }}'; activeRole = '{{ addslashes($itemData['jabatan']) }}'">
                                
                                <img src="{{ $itemData['imgUrl'] }}" 
                                     alt="{{ $itemData['namaLengkap'] }}" 
                                     class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                                
                                <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center p-4">
                                    <span class="text-xs font-semibold text-white bg-black/40 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                                        Perbesar Foto
                                    </span>
                                </div>
                            </div>

                            <!-- Detail Nama, Gelar & Jabatan Wakil Dekan -->
                            <div class="p-6 text-center flex-1 flex flex-col justify-center bg-white">
                                <div class="w-10 h-1 bg-[#7A1C28]/80 mx-auto mb-3 rounded-full"></div>
                                <span class="inline-block self-center px-3 py-0.5 text-[11px] font-bold tracking-wider uppercase text-[#7A1C28] bg-red-50 rounded-full mb-2">
                                    {{ $itemData['jabatan'] }}
                                </span>
                                <h3 class="text-base sm:text-lg font-extrabold text-gray-900 leading-snug">
                                    {{ $itemData['namaLengkap'] }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-gray-100 max-w-lg mx-auto shadow-xs">
                <p class="text-gray-500 text-sm">Data pimpinan fakultas belum ditambahkan pada panel admin.</p>
            </div>
        @endif

    </div>

    <!-- Modal Lightbox Foto Pimpinan -->
    <div x-show="modalOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[99999] flex items-center justify-center p-4 bg-black/85 backdrop-blur-xs"
         style="display: none;"
         @keydown.escape.window="modalOpen = false">
        
        <div class="relative max-w-lg w-full bg-white rounded-3xl overflow-hidden shadow-2xl" @click.outside="modalOpen = false">
            <button @click="modalOpen = false" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-black/50 text-white hover:bg-[#7A1C28] flex items-center justify-center transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <img :src="activeImg" :alt="activeName" class="w-full max-h-[70vh] object-cover object-top">
            <div class="p-5 text-center bg-white">
                <p class="text-xs font-bold uppercase tracking-wider text-[#7A1C28]" x-text="activeRole"></p>
                <h4 class="text-lg font-extrabold text-gray-900 mt-1" x-text="activeName"></h4>
            </div>
        </div>
    </div>
</main>
@endsection