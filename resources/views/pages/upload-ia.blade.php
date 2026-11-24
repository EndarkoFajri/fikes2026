@extends('layouts.app')

@section('title', 'Upload IA - FIKES Universitas dr. Soebandi')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Kerja Sama
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                {{ $pengaturan->judul_form_ia ?? 'Upload Implementation Arrangement (IA)' }}
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                Silakan lengkapi formulir pelaporan dan unggah dokumen IA melalui formulir di bawah ini
            </p>
        </div>

        @if(isset($pengaturan) && $pengaturan->link_embed_ia)
            <div class="bg-white rounded-3xl border border-gray-200/80 shadow-md overflow-hidden">
                <div class="px-5 py-3.5 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                    <span class="text-xs font-semibold text-gray-600">Formulir Online FIKES UDS</span>
                    <a href="{{ str_replace('?embedded=true', '', $pengaturan->link_embed_ia) }}" target="_blank"
                       class="text-xs font-bold text-[#7A1C28] hover:underline">
                        Buka Formulir di Tab Baru &rarr;
                    </a>
                </div>
                <iframe src="{{ $pengaturan->link_embed_ia }}"
                        class="w-full h-[85vh] border-0"
                        frameborder="0" marginheight="0" marginwidth="0">
                    Memuat formulir...
                </iframe>
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 text-center border border-gray-200/80 max-w-lg mx-auto">
                <p class="text-gray-500 text-sm">Link formulir Upload IA belum diatur pada panel admin.</p>
            </div>
        @endif

    </div>
</main>
@endsection