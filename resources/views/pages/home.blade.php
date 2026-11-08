@extends('layouts.app')

@section('content')
<!-- Full Width Hero Banner Section -->
<section class="relative w-full min-h-[580px] lg:min-h-[640px] flex items-center overflow-hidden">
    <!-- Gambar Background Full Width -->
    <div class="absolute inset-0 z-0">
        <img src="images/fikes2.png" 
             alt="Mahasiswa FIKES Praktik Klinik" 
             class="w-full h-full object-cover object-center">
        <!-- Overlay Gradient Gelap & Modern agar teks sangat terbaca -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/60 to-black/30"></div>
    </div>

    <!-- Konten Teks & Tombol di atas Banner -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 sm:px-10 lg:px-12 py-20 flex flex-col justify-between">
        <div class="max-w-2xl space-y-6">
            
            <!-- Tag Subtitle -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-xs font-semibold uppercase tracking-wider">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Fakultas Ilmu Kesehatan
            </div>

            <!-- Headline Utama Putih & Merah Kontras -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.15]">
                Belajar untuk <span class="text-rose-400">merawat.</span><br>
                Berkarya untuk kehidupan.
            </h1>

            <!-- Deskripsi -->
            <p class="text-gray-200 text-base sm:text-lg leading-relaxed max-w-xl font-normal">
                Mulai langkah Anda menjadi insan kesehatan yang kompeten, berempati, dan siap memberi dampak nyata bagi masyarakat.
            </p>

            <!-- Tombol-tombol CTA -->
            <div class="flex flex-wrap items-center gap-4 pt-3">
                <a href="#prodi-section" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-7 py-3.5 rounded-xl font-bold text-sm transition-all shadow-lg hover:shadow-primary/30 hover:-translate-y-0.5">
                    <span>Jelajahi Program Studi</span>
                    </a>
                
                <a href="{{ route('profil.visi-misi') }}" class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 text-white border border-white/30 backdrop-blur-md px-7 py-3.5 rounded-xl font-bold text-sm transition-all hover:-translate-y-0.5">
                    <span>Kenali Fakultas</span>
                   
                </a>
            </div>

            <!-- Value / Slogan Ringkas Bawah -->
            <div class="flex items-center gap-2.5 text-xs text-gray-300 font-medium pt-3">
                                <span>Ilmu, kepedulian, dan pengalaman klinis nyata.</span>
            </div>

        </div>

        <!-- Floating Badge Kaca (Glassmorphism) di Sudut Kanan Bawah Banner -->
        <div class="mt-10 lg:mt-0 lg:absolute lg:bottom-12 lg:right-12 max-w-sm bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/20 text-white flex items-center gap-3.5 shadow-2xl">
            <div class="w-11 h-11 rounded-xl bg-white/20 text-white flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <div>
                <h4 class="text-xs font-bold leading-tight text-white">Belajar dekat dengan praktik.</h4>
                <p class="text-[11px] text-gray-200 leading-tight mt-1">Tumbuh bersama, melayani dengan hati.</p>
            </div>
        </div>

    </div>
</section>

<!-- Section Profil Fakultas (Tentang FIKES UDS) -->
<section class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
        
        <!-- Sisi Kiri: Kartu Logo Besar dengan Banner Gelap di Bawah -->
        <div class="lg:col-span-5">
            <div class="relative bg-white rounded-3xl p-8 sm:p-10 border border-gray-100 shadow-xl flex flex-col items-center justify-between min-h-115">
                
                <!-- Foto Dekan & Nama -->
<div class="w-full flex-1 flex flex-col items-center justify-center py-4">
    <div class="relative w-52 h-52 sm:w-60 sm:h-60 rounded-full overflow-hidden border-4 border-white shadow-lg bg-gray-50 mb-4">
        @if(!empty($dekan?->foto_dekan))
            <img src="{{ asset('storage/' . $dekan->foto_dekan) }}" 
                 alt="{{ $dekan->nama_dekan }}" 
                 class="w-full h-full object-cover">
        @else
            <!-- Placeholder jika data/foto belum diisi di admin -->
            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-gray-400 text-xs text-center p-4">
                Foto Pimpinan Belum Diunggah
            </div>
        @endif
    </div>

    <!-- Nama & Gelar Dekan -->
    <h3 class="text-lg sm:text-xl font-bold text-gray-900 text-center tracking-tight">
        {{ $dekan->nama_dekan ?? 'Pimpinan Fakultas' }}{{ !empty($dekan?->gelar_dekan) ? ', ' . $dekan->gelar_dekan : '' }}
    </h3>
    <p class="text-xs font-semibold text-primary uppercase tracking-wider mt-1 text-center">
        {{ $dekan->jabatan ?? 'Dekan Fakultas Ilmu Kesehatan' }}
    </p>
</div>

<!-- Banner Bawah (Kutipan Sambutan Singkat) -->
<div class="w-full bg-[#1A264F] text-white p-5 rounded-2xl shadow-md mt-2">
    <h4 class="text-xs sm:text-sm font-bold tracking-wide mb-1 text-white flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
        {{ $dekan->slogan_badge ?? 'Pelayanan & Karakter Unggul' }}
    </h4>
    <p class="text-[11px] sm:text-xs text-blue-100/80 leading-relaxed">
        {{ $dekan->kutipan_dekan ?? 'Mempersiapkan tenaga kesehatan profesional yang kompeten, beretika luhur, berjiwa kewirausahaan, dan tanggap di dunia klinis.' }}
    </p>
</div>
            </div>
        </div>

        <!-- Sisi Kanan: Uraian Teks Profil & Poin Keunggulan -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Label Sub-Header -->
            <div class="inline-block">
                <span class="text-xs font-extrabold tracking-widest text-primary uppercase bg-red-50 px-3 py-1 rounded-md">
                    PROFIL FAKULTAS
                </span>
            </div>

            <!-- Headline Utama -->
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight leading-tight">
                Berdedikasi untuk <br class="hidden sm:inline">
                <span class="text-primary">Kesehatan Masyarakat.</span>
            </h2>

            <!-- Deskripsi Narasi FIKES -->
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                Fakultas Ilmu Kesehatan (FIKES) Universitas dr. Soebandi didirikan untuk menjawab kebutuhan tenaga kesehatan yang unggul dan adaptif, khususnya dalam bidang Keperawatan, Kebidanan, Profesi Ners, dan Farmasi yang berakar kuat pada nilai kemanusiaan, sains mutakhir, serta etika profesional.
            </p>

            <!-- Daftar Poin Keunggulan dengan Tanda Centang -->
            <ul class="space-y-3.5 pt-2">
                <li class="flex items-start gap-3">
                    <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    <span class="text-xs sm:text-sm text-gray-700 font-medium leading-snug">
                        Kurikulum adaptif berbasis kompetensi nasional dan integrasi teknologi kesehatan terkini.
                    </span>
                </li>

                <li class="flex items-start gap-3">
                    <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    <span class="text-xs sm:text-sm text-gray-700 font-medium leading-snug">
                        Fasilitas laboratorium terpadu, Mini Hospital berstandar OSCE, dan ruang simulasi klinis modern.
                    </span>
                </li>

                <li class="flex items-start gap-3">
                    <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    <span class="text-xs sm:text-sm text-gray-700 font-medium leading-snug">
                        Dosen tetap berkualifikasi magister dan doktoral serta berstatus praktisi klinis tersertifikasi.
                    </span>
                </li>

                <li class="flex items-start gap-3">
                    <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    <span class="text-xs sm:text-sm text-gray-700 font-medium leading-snug">
                        Jejaring praktik profesi terintegrasi dengan berbagai rumah sakit tipe B & A, puskesmas, serta industri farmasi mitra.
                    </span>
                </li>
            </ul>

            <!-- Tautan Navigasi Lanjut -->
            <div class="pt-4">
                <a href="{{ route('profil.visi-misi') }}" class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-primary-dark transition-colors group">
                    <span>Pelajari Selengkapnya</span>
                    <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>

        </div>

    </div>
</section>

<!-- Section Program Studi Modern Bento Cards -->
<section id="prodi-section" class="w-full max-w-7xl mx-auto px-6 sm:px-10 lg:px-12 py-20 relative">
    
    <!-- Background Decorator Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-150 h-87.5 bg-red-100/40 rounded-full blur-3xl -z-10 pointer-events-none"></div>

    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-red-50 border border-red-100 rounded-full text-primary text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                Pilihan Program Studi
            </div>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 tracking-tight leading-tight">
                Pendidikan Unggul, Siap Berkarier di Dunia Kesehatan.
            </h2>
        </div>
    </div>

    <!-- Grid Program Studi -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($prodi as $item)
            <div class="group relative bg-white rounded-3xl p-7 border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_35px_-10px_rgba(122,28,40,0.12)] transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between overflow-hidden">
                
                <!-- Aksen Garis Gradasi Atas saat Hover -->
                <div class="absolute top-0 inset-x-0 h-1.5 bg-linear-to-r from-primary via-red-500 to-amber-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <!-- Bagian Atas: Badge Jenjang, Akreditasi, dan Icon -->
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <!-- Jenjang & Akreditasi Badge -->
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 bg-primary text-white text-[11px] font-extrabold uppercase rounded-lg shadow-sm">
                                {{ $item->jenjang ?? 'S1' }}
                            </span>
                            <span class="px-2.5 py-1 bg-amber-50 border border-amber-200 text-amber-700 text-[11px] font-bold rounded-lg flex items-center gap-1">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                Akreditasi {{ strtoupper($item->akreditasi ?? 'Unggul') }}
                            </span>
                        </div>
                    </div>

                    <!-- Judul Program Studi -->
                    <h3 class="text-xl font-extrabold text-gray-900 group-hover:text-primary transition-colors leading-snug mb-3">
                        <a href="{{ route('prodi.show', $item->slug ?? '#') }}">
                            {{ $item->nama_prodi }}
                        </a>
                    </h3>

                    <!-- Deskripsi Singkat / Prospek -->
                    <p class="text-gray-500 text-xs sm:text-sm leading-relaxed mb-6 line-clamp-3">
                        {{ strip_tags($item->deskripsi) ?: 'Mempersiapkan tenaga ahli bidang kesehatan berstandar kompetensi klinis dengan kurikulum berbasis praktik dan etika profesional.' }}
                    </p>

                </div>

                <!-- Bagian Bawah: Tombol Action Bersih & Modern -->
                <div class="pt-5 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('prodi.show', $item->slug ?? '#') }}" class="text-xs font-bold text-gray-900 group-hover:text-primary inline-flex items-center gap-1.5 transition-colors">
                        <span> Detail Program Studi</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <a href="https://pmb.uds.ac.id" target="_blank" class="w-8 h-8 rounded-full bg-gray-50 hover:bg-primary text-gray-500 hover:text-white flex items-center justify-center transition-colors" title="Daftar Sekarang">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>

            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-200">
                <div class="w-12 h-12 bg-red-50 text-primary rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <h4 class="text-gray-800 font-bold text-base mb-1">Belum Ada Program Studi Ditambahkan</h4>
                <p class="text-xs text-gray-400">Silakan tambahkan data program studi melalui menu Akademik di panel admin Filament.</p>
            </div>
        @endforelse
    </div>
</section>

<<!-- Section Berita Terkini Grid Bento -->
<section class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
        <div>
            <div class="flex items-center gap-3">
                <span class="w-2 h-7 bg-primary rounded-full"></span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Berita Terkini</h2>
            </div>
            <p class="text-sm text-gray-500 mt-1 pl-5">Informasi terbaru mengenai kegiatan, prestasi, dan berbagai kabar dari FIKES UDS.</p>
        </div>
        <div>
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:underline">
                <span>Lihat Semua</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>

    <!-- Bento Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- 1. KAD UTAMA (Paling Baharu - Kotak Besar) -->
        @if($beritaUtama)
            <div class="lg:col-span-2 lg:row-span-2 relative rounded-2xl overflow-hidden group shadow-md" style="min-height: 480px; height: 100%;">
                <!-- Gambar Latar -->
                @if($beritaUtama->gambar)
                    <img src="{{ asset('storage/' . $beritaUtama->gambar) }}" 
                         alt="{{ $beritaUtama->judul }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                @else
                    <div class="w-full h-full bg-slate-800" style="position: absolute; top: 0; left: 0;"></div>
                @endif

                <!-- Lapisan Gelap (Overlay Gradient) -->
                <div class="absolute inset-0 bg-linear-to-t from-black/90 via-black/40 to-transparent pointer-events-none"></div>

                <!-- Teks Kandungan -->
                <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8 flex flex-col justify-end z-10">
                    <div class="mb-3">
                        <span class="inline-block px-3 py-1 bg-amber-500 text-white text-xs font-semibold rounded-md shadow-sm">
                            {{ $beritaUtama->kategori }}
                        </span>
                    </div>
                    <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white leading-snug mb-2 group-hover:text-amber-200 transition-colors">
                        <a href="{{ route('berita.show', $beritaUtama->slug) }}">
                            {{ $beritaUtama->judul }}
                        </a>
                    </h3>
                    <p class="text-xs text-gray-300 font-medium">
                        {{ $beritaUtama->created_at->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
        @endif

        <!-- 2. KAD-KAD BERITA LAIN -->
        @forelse($beritaLainnya as $berita)
            <div class="relative rounded-2xl overflow-hidden group shadow-md" style="min-height: 228px;">
                <!-- Gambar Latar -->
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                         alt="{{ $berita->judul }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                @else
                    <div class="w-full h-full bg-slate-800" style="position: absolute; top: 0; left: 0;"></div>
                @endif

                <!-- Lapisan Gelap -->
                <div class="absolute inset-0 bg-linear-to-t from-black/90 via-black/40 to-transparent pointer-events-none"></div>

                <!-- Teks Kandungan -->
                <div class="absolute inset-x-0 bottom-0 p-5 flex flex-col justify-end z-10">
                    <div class="mb-2">
                        <span class="inline-block px-2.5 py-0.5 bg-amber-500 text-white text-[11px] font-semibold rounded shadow-sm">
                            {{ $berita->kategori }}
                        </span>
                    </div>
                    <h4 class="text-sm sm:text-base font-bold text-white leading-snug line-clamp-2 mb-1 group-hover:text-amber-200 transition-colors">
                        <a href="{{ route('berita.show', $berita->slug) }}">
                            {{ $berita->judul }}
                        </a>
                    </h4>
                    <p class="text-[11px] text-gray-300">
                        {{ $berita->created_at->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
        @empty
            @if(!$beritaUtama)
                <div class="col-span-full py-12 text-center text-gray-400 bg-white rounded-2xl border border-gray-100">
                    Belum ada publikasi berita terbaru.
                </div>
            @endif
        @endforelse

    </div>
</section>
    <!-- Section Galeri Kolase Modern FIKES UDS -->
<section class="w-full bg-slate-50/70 py-20 border-t border-gray-100" x-data="{ modalOpen: false, activeImage: '', activeCaption: '' }">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-12">
        
        <!-- Header Galeri -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-red-50 border border-red-100 rounded-full text-primary text-xs font-bold uppercase tracking-wider mb-2">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Dokumentasi & Aktivitas
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Kehidupan Kampus & Praktik Klinis
                </h2>
            </div>
            </div>

        <!-- Kolase Grid Asimetris -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 auto-rows-[160px] sm:auto-rows-[190px] md:auto-rows-[220px]">
            
            <!-- Item 1: Besar Kiri (Span 2 Kolom, 2 Baris) -->
            <div class="relative group col-span-2 row-span-2 rounded-2xl overflow-hidden shadow-sm cursor-pointer"
                 @click="modalOpen = true; activeImage = 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=1200&q=80'; activeCaption = 'Praktik Simulasi Klinis Keperawatan'">
                <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80" 
                     alt="Praktik Simulasi Klinis" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <!-- Overlay Merah Maroon saat Hover -->
                <div class="absolute inset-0 bg-[#7A1C28]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-4 text-white text-center">
                    <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center mb-2 transform scale-75 group-hover:scale-100 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    </div>
                    <span class="text-xs sm:text-sm font-bold tracking-wide">Praktik Simulasi Klinis</span>
                    <span class="text-[10px] text-white/80 mt-0.5">Klik untuk memperbesar</span>
                </div>
            </div>

            <!-- Item 2: Landscape Atas Tengah (Span 2 Kolom) -->
            <div class="relative group col-span-2 row-span-1 rounded-2xl overflow-hidden shadow-sm cursor-pointer"
                 @click="modalOpen = true; activeImage = 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80'; activeCaption = 'Fasilitas Laboratorium & Diskusi Medis'">
                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80" 
                     alt="Diskusi Medis" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-[#7A1C28]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-4 text-white text-center">
                    <svg class="w-6 h-6 text-white mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    <span class="text-xs font-bold">Laboratorium & Diskusi Kasus Medis</span>
                </div>
            </div>

            <!-- Item 3: Kotak Reguler 1 -->
            <div class="relative group col-span-1 row-span-1 rounded-2xl overflow-hidden shadow-sm cursor-pointer"
                 @click="modalOpen = true; activeImage = 'https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&w=1000&q=80'; activeCaption = 'Pemeriksaan Kesehatan Komprehensif'">
                <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&w=500&q=80" 
                     alt="Pemeriksaan Kesehatan" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-[#7A1C28]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-3 text-white text-center">
                    <svg class="w-5 h-5 text-white mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    <span class="text-[11px] font-bold">Pemeriksaan Pasien</span>
                </div>
            </div>

            <!-- Item 4: Kotak Reguler 2 -->
            <div class="relative group col-span-1 row-span-1 rounded-2xl overflow-hidden shadow-sm cursor-pointer"
                 @click="modalOpen = true; activeImage = 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=1000&q=80'; activeCaption = 'Bimbingan Akademik & Praktek Lapangan'">
                <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=500&q=80" 
                     alt="Bimbingan Mahasiswa" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-[#7A1C28]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-3 text-white text-center">
                    <svg class="w-5 h-5 text-white mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    <span class="text-[11px] font-bold">Bimbingan Klinik</span>
                </div>
            </div>

            <!-- Item 5: Kotak Reguler Bawah 1 -->
            <div class="relative group col-span-1 row-span-1 rounded-2xl overflow-hidden shadow-sm cursor-pointer"
                 @click="modalOpen = true; activeImage = 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?auto=format&fit=crop&w=1000&q=80'; activeCaption = 'Kegiatan Riset Farmasi & Farmakologi'">
                <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?auto=format&fit=crop&w=500&q=80" 
                     alt="Riset Farmasi" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-[#7A1C28]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-3 text-white text-center">
                    <svg class="w-5 h-5 text-white mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    <span class="text-[11px] font-bold">Riset Farmasi</span>
                </div>
            </div>
       <div class="relative group col-span-1 row-span-1 rounded-2xl overflow-hidden shadow-sm cursor-pointer"
                 @click="modalOpen = true; activeImage = 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?auto=format&fit=crop&w=1000&q=80'; activeCaption = 'Kegiatan Riset Farmasi & Farmakologi'">
                <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?auto=format&fit=crop&w=500&q=80" 
                     alt="Riset Farmasi" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-[#7A1C28]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-3 text-white text-center">
                    <svg class="w-5 h-5 text-white mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    <span class="text-[11px] font-bold">Riset Farmasi</span>
                </div>
            </div>
        
                 <!-- Item 7: Span 2 Kolom Bawah Kanan -->
            <div class="relative group col-span-2 row-span-1 rounded-2xl overflow-hidden shadow-sm cursor-pointer"
                 @click="modalOpen = true; activeImage = 'https://images.unsplash.com/photo-1527613426441-4da17471b66d?auto=format&fit=crop&w=1200&q=80'; activeCaption = 'Pengabdian Masyarakat & Edukasi Kesehatan'">
                <img src="https://images.unsplash.com/photo-1527613426441-4da17471b66d?auto=format&fit=crop&w=800&q=80" 
                     alt="Pengabdian Masyarakat" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-[#7A1C28]/85 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-4 text-white text-center">
                    <svg class="w-6 h-6 text-white mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                    <span class="text-xs font-bold">Edukasi & Pengabdian Komunitas</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Lightbox Modal (Muncul saat foto diklik) -->
    <div x-show="modalOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/90 backdrop-blur-sm"
         style="display: none;"
         @keydown.escape.window="modalOpen = false">
        
        <!-- Tombol Tutup Silang di Kanan Atas -->
        <button @click="modalOpen = false" class="absolute top-5 right-5 sm:top-8 sm:right-8 text-white/80 hover:text-white p-2 rounded-full bg-white/10 hover:bg-white/20 transition-colors z-50">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <!-- Area Konten Gambar Pop-up -->
        <div class="relative max-w-5xl w-full max-h-[85vh] flex flex-col items-center justify-center" @click.outside="modalOpen = false">
            <img :src="activeImage" :alt="activeCaption" class="max-h-[75vh] w-auto max-w-full rounded-2xl shadow-2xl object-contain border border-white/10">
            <p class="text-white font-medium text-sm sm:text-base mt-4 text-center tracking-wide" x-text="activeCaption"></p>
        </div>
    </div>
</section> 
<!-- Section Profil Kampus / Kuliah di UDS -->
<section class="w-full bg-[#f8fafc] py-16 sm:py-20 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            <!-- Sisi Kiri: Video Profil Kampus (16:9 Responsive Embed) -->
            <div class="lg:col-span-7">
                <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl border border-gray-200/80 bg-black aspect-video group">
                    <iframe 
                        class="w-full h-full object-cover"
                        src="https://www.youtube-nocookie.com/embed/HSDQbBysVys?rel=0&modestbranding=1" 
                        title="Campus Profile Universitas dr. Soebandi | A Journey Through Innovation, Leadership, and Care" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Sisi Kanan: Teks Kuliah di UDS & Tombol Aksi Maroon -->
            <div class="lg:col-span-5 space-y-5">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-red-50 border border-red-100 rounded-full text-primary text-[11px] font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Profil Kampus
                </div>

                <!-- Judul Diubah Menjadi Merah Maroon Institusi -->
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#7A1C28] tracking-tight leading-tight">
                    Kuliah di FIKES UDS
                </h2>

                <p class="text-gray-600 text-sm leading-relaxed text-justify">
                    Universitas dr. Soebandi (UDS) hadir sebagai lembaga pendidikan tinggi yang berkomitmen membina mahasiswa menjadi pribadi yang profesional, unggul, dan berakhlakul karimah. Melalui Fakultas Ilmu Kesehatan, UDS menyelenggarakan proses pembelajaran yang berpusat pada penguasaan kompetensi klinis terintegrasi, kedalaman riset kesehatan terapan, serta penguatan nilai moral dan spiritual. Kami percaya bahwa pendidikan tenaga medis bukan hanya soal pencapaian akademik, tetapi juga dedikasi kemanusiaan dalam melayani masyarakat.
                </p>

                <!-- Tombol Aksi Full Maroon -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="https://pmb.uds.ac.id" 
                       target="_blank" 
                       class="inline-flex items-center justify-center px-6 py-2.5 bg-[#7A1C28] hover:bg-[#63141f] text-white text-xs sm:text-sm font-semibold rounded-lg shadow-sm hover:shadow transition-all duration-200">
                        Laman Pendaftaran
                    </a>
                    <a href="{{ asset('files/brosur-fikes-uds.pdf') }}" 
                       target="_blank" 
                       class="inline-flex items-center justify-center px-6 py-2.5 bg-[#63141f] hover:bg-[#4f0f18] text-white text-xs sm:text-sm font-semibold rounded-lg shadow-sm hover:shadow transition-all duration-200">
                        Brosur
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection