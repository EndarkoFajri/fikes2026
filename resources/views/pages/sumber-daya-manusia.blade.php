@extends('layouts.app')

@section('title', 'Sumber Daya Manusia - FIKES Universitas dr. Soebandi')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- Header Halaman -->
        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Profil Institusi
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                {{ $dokumen->judul ?? 'Sumber Daya Manusia' }}
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                Informasi Sumber Daya Manusia di lingkungan Fakultas Ilmu Kesehatan Universitas dr. Soebandi
            </p>
            @if(isset($dokumen) && $dokumen->keterangan)
                <div class="pt-1">
                    <span class="inline-flex items-center px-3 py-1 rounded-lg bg-white border border-gray-200 text-xs font-bold text-gray-700 shadow-xs">
                        {{ $dokumen->keterangan }}
                    </span>
                </div>
            @endif
        </div>

        <!-- Preview PDF -->
        @if(isset($dokumen) && $dokumen->file_pdf)
            @php
                $pdfUrl = str_starts_with($dokumen->file_pdf, 'http')
                    ? $dokumen->file_pdf
                    : asset('storage/' . ltrim($dokumen->file_pdf, '/'));
            @endphp

            <div class="bg-white rounded-3xl border border-gray-200/80 shadow-md overflow-hidden">
                <div class="px-5 py-4 bg-gray-50 border-b border-gray-200 flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <div class="w-9 h-9 rounded-xl bg-red-100 text-[#7A1C28] flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="truncate">
                            <p class="text-xs sm:text-sm font-bold text-gray-900 truncate">{{ $dokumen->judul }}</p>
                            <p class="text-[11px] text-gray-500">Dokumen PDF Resmi FIKES UDS</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <a href="{{ $pdfUrl }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 text-xs font-semibold text-gray-700 transition-colors">
                            Buka Tab Baru
                        </a>
                        <a href="{{ $pdfUrl }}" download class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-[#7A1C28] hover:bg-[#5e141e] text-white text-xs font-semibold shadow-xs transition-colors">
                            Unduh PDF
                        </a>
                    </div>
                </div>

                <div class="w-full bg-gray-100">
                    <iframe src="{{ $pdfUrl }}#toolbar=1&navpanes=0"
                            class="w-full h-[75vh] sm:h-[85vh] border-0"
                            title="{{ $dokumen->judul }}">
                    </iframe>
                </div>
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-gray-200/80 max-w-lg mx-auto shadow-xs">
                <p class="text-gray-500 text-sm font-medium">Dokumen Sumber Daya Manusia belum diunggah pada panel admin.</p>
            </div>
        @endif

    </div>
</main>
@endsection