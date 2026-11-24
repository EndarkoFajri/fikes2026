@extends('layouts.app')

@section('title', 'Visi, Misi, Tujuan, dan Sasaran - FIKES UDS')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        <!-- Header Halaman -->
        <div class="text-center space-y-3">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Profil Institusi
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                Visi, Misi, Tujuan, dan Sasaran
            </h1>
            <p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
                Fakultas Ilmu Kesehatan Universitas dr. Soebandi
            </p>
        </div>

        @if(isset($visiMisi) && $visiMisi)
            @php
                // Helper aman untuk mengubah string JSON / teks biasa / array menjadi array bersih
                $toList = function ($value) {
                    if (is_array($value)) {
                        return $value;
                    }
                    if (is_string($value) && trim($value) !== '') {
                        $decoded = json_decode($value, true);
                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                            return $decoded;
                        }
                        // Jika ternyata teks biasa dipisah baris baru (Enter)
                        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $value))));
                    }
                    return [];
                };

                $misiList = $toList($visiMisi->misi ?? null);
                $tujuanList = $toList($visiMisi->tujuan ?? null);
                $sasaranList = $toList($visiMisi->sasaran ?? null);
            @endphp

            <!-- ================= 1. VISI ================= -->
            @if(!empty($visiMisi->visi))
                <section class="text-center max-w-4xl mx-auto space-y-4">
                    <div class="inline-flex items-center justify-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#7A1C28]"></span>
                        <h2 class="text-xl sm:text-2xl font-bold text-[#7A1C28] tracking-wide">
                            Visi
                        </h2>
                        <span class="w-2.5 h-2.5 rounded-full bg-[#7A1C28]"></span>
                    </div>
                    
                    <div class="bg-white p-8 sm:p-10 rounded-3xl border border-gray-200/80 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-[#7A1C28]"></div>
                        <p class="text-gray-800 text-base sm:text-lg lg:text-xl font-medium leading-relaxed italic">
                            "{{ $visiMisi->visi }}"
                        </p>
                    </div>
                </section>
            @endif

            <!-- ================= 2. MISI ================= -->
            @if(count($misiList) > 0)
                <section class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
                        <div class="w-8 h-8 rounded-xl bg-red-50 text-[#7A1C28] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                            Misi
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        @foreach($misiList as $item)
                            @php $teksMisi = is_array($item) ? ($item['isi'] ?? reset($item)) : $item; @endphp
                            <div class="flex items-start gap-3.5 bg-white p-5 rounded-2xl border border-gray-200/80 shadow-xs hover:border-[#7A1C28]/40 transition-colors {{ $loop->last && $loop->count % 2 !== 0 ? 'md:col-span-2' : '' }}">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <p class="text-sm sm:text-base text-gray-700 leading-snug">
                                    {{ $teksMisi }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- ================= 3. TUJUAN ================= -->
            @if(count($tujuanList) > 0)
                <section class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
                        <div class="w-8 h-8 rounded-xl bg-red-50 text-[#7A1C28] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                            Tujuan
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        @foreach($tujuanList as $item)
                            @php $teksTujuan = is_array($item) ? ($item['isi'] ?? reset($item)) : $item; @endphp
                            <div class="bg-white p-5 sm:p-6 rounded-2xl border border-gray-200/80 shadow-xs hover:border-[#7A1C28]/40 transition-colors flex items-center {{ $loop->last && $loop->count % 2 !== 0 ? 'md:col-span-2' : '' }}">
                                <p class="text-sm sm:text-base text-gray-700">
                                    {{ $teksTujuan }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- ================= 4. SASARAN ================= -->
            @if(count($sasaranList) > 0)
                <section class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-200 pb-3">
                        <div class="w-8 h-8 rounded-xl bg-red-50 text-[#7A1C28] flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                            Sasaran
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                        @foreach($sasaranList as $item)
                            @php
                                $judulSasaran = is_array($item) ? ($item['judul'] ?? '') : '';
                                $deskSasaran = is_array($item) ? ($item['deskripsi'] ?? ($item['isi'] ?? '')) : $item;
                            @endphp
                            <div class="bg-white p-5 sm:p-6 rounded-2xl border border-gray-200/80 shadow-xs hover:border-[#7A1C28]/40 transition-colors flex items-start gap-4 {{ $loop->last && $loop->count % 2 !== 0 ? 'md:col-span-2' : '' }}">
                                <div class="w-8 h-8 rounded-xl bg-red-100 text-[#7A1C28] flex items-center justify-center shrink-0 font-bold text-xs">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <div>
                                    @if($judulSasaran)
                                        <h3 class="text-sm sm:text-base font-bold text-gray-900 mb-1">
                                            {{ $judulSasaran }}
                                        </h3>
                                    @endif
                                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                        {{ $deskSasaran }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-gray-200/80 max-w-lg mx-auto shadow-xs">
                <p class="text-gray-500 text-sm font-medium">Data Visi, Misi, Tujuan, dan Sasaran belum diisi pada panel admin.</p>
            </div>
        @endif

    </div>
</main>
@endsection     