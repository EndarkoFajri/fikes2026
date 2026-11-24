@extends('layouts.app')

@section('title', 'Pedoman Kerja Sama - FIKES Universitas dr. Soebandi')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Kerja Sama
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                {{ $pengaturan->judul_pedoman ?? 'Pedoman Kerja Sama' }}
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                Panduan resmi pelaksanaan kerja sama di lingkungan Fakultas Ilmu Kesehatan Universitas dr. Soebandi
            </p>
        </div>

        @if(isset($pengaturan) && $pengaturan->file_pedoman_pdf)
            @php $pdfUrl = asset('storage/' . ltrim($pengaturan->file_pedoman_pdf, '/')); @endphp
            <div class="bg-white rounded-3xl border border-gray-200/80 shadow-md overflow-hidden">
                <div class="px-5 py-4 bg-gray-50 border-b border-gray-200 flex flex-wrap items-center justify-between gap-3">
                    <p class="text-xs sm:text-sm font-bold text-gray-900">{{ $pengaturan->judul_pedoman }}</p>
                    <div class="flex items-center gap-2.5">
                        <a href="{{ $pdfUrl }}" target="_blank" class="px-3.5 py-2 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 text-xs font-semibold text-gray-700">Buka Tab Baru</a>
                        <a href="{{ $pdfUrl }}" download class="px-4 py-2 rounded-xl bg-[#7A1C28] hover:bg-[#5e141e] text-white text-xs font-semibold">Unduh PDF</a>
                    </div>
                </div>
                <iframe src="{{ $pdfUrl }}#toolbar=1&navpanes=0" class="w-full h-[75vh] sm:h-[85vh] border-0"></iframe>
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-gray-200/80 max-w-lg mx-auto">
                <p class="text-gray-500 text-sm">Dokumen Pedoman Kerja Sama belum diunggah pada panel admin.</p>
            </div>
        @endif
    </div>
</main>
@endsection