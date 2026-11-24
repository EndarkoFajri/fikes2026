@extends('layouts.app')

@section('title', $pageTitle . ' - FIKES Universitas dr. Soebandi')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- Header Halaman -->
        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Rencana Pengembangan Fakultas
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                {{ $dokumen->judul ?? $pageTitle }}
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                {{ $pageSubtitle }}
            </p>
            @if(isset($dokumen) && $dokumen->periode)
                <div class="pt-1">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white border border-gray-200 text-xs font-bold text-gray-700 shadow-xs">
                        <svg class="w-3.5 h-3.5 text-[#7A1C28]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Periode {{ $dokumen->periode }}
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
                <!-- Toolbar Atas PDF -->
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
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            <span>Buka Tab Baru</span>
                        </a>
                        <a href="{{ $pdfUrl }}" download class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-[#7A1C28] hover:bg-[#5e141e] text-white text-xs font-semibold shadow-xs transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>Unduh PDF</span>
                        </a>
                    </div>
                </div>

                <!-- Embed Viewer PDF -->
                <div class="w-full bg-gray-100">
                    <iframe src="{{ $pdfUrl }}#toolbar=1&navpanes=0" 
                            class="w-full h-[75vh] sm:h-[85vh] border-0"
                            title="{{ $dokumen->judul }}">
                    </iframe>
                </div>
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-gray-200/80 max-w-lg mx-auto shadow-xs space-y-2">
                <svg class="w-10 h-10 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <p class="text-gray-500 text-sm font-medium">Dokumen {{ $pageTitle }} belum diunggah pada panel admin.</p>
            </div>
        @endif

    </div>
</main>
@endsection