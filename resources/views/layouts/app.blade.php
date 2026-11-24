<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fakultas Ilmu Kesehatan - Universitas dr. Soebandi')</title>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: '#7A1C28',
                        'primary-dark': '#63141F',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-[#FBFBFC] text-gray-800 antialiased selection:bg-red-100 selection:text-primary">

    <!-- Header / Navbar Resmi FIKES UDS -->
    <header x-data="{ mobileMenu: false }" class="w-full bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="w-full max-w-[1400px] mx-auto px-6 sm:px-10 lg:px-14 h-20 flex items-center justify-between gap-4">
            
            <!-- Brand Logo & Nama -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 ml-2 lg:ml-4">
                <img src="{{ asset('images/fikes.png') }}" 
                     alt="Logo FIKES UDS" 
                     class="h-10 w-auto object-contain">
            </a>

            <!-- Menu Utama Tengah -->
            <nav class="hidden xl:flex items-center gap-5 text-[12px] font-bold tracking-wider text-gray-700 uppercase">
                <!-- HOME -->
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors py-2">HOME</a>
                <!-- PROFIL -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                        <span>PROFIL</span>
                        <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-52 hidden group-hover:block z-50">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 normal-case font-medium">
                            <a href="{{ route('profil.visi-misi') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Visi, Misi & Tujuan</a>
                            <a href="{{ route('profil.pimpinan') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Pimpinan Fakultas</a>
                            <a href="{{ route('profil.struktur') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Organisasi & Tata Kelola</a>
                            <div class="relative group/sub">
                                <button type="button" class="w-full flex items-center justify-between px-4 py-2 text-xs text-gray-700 hover:bg-red-50 hover:text-primary text-left transition-colors">
                                    <span>Rencana Pengembangan Fakultas</span>
                                    <svg class="w-3.5 h-3.5 shrink-0 ml-2 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>

                <!-- Flyout Submenu (Muncul di sebelah kanan) -->
                <div class="absolute left-full top-0 w-52 hidden group-hover/sub:block z-50">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2">
                        <a href="{{ route('profil.renstra') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">
                            Rencana Strategis
                        </a>
                        <a href="{{ route('profil.renop') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">
                            Rencana Operasional
                        </a>
                    </div>
                </div>
            </div>
                        <!-- Submenu Bertingkat: Kerja Sama -->
            <div class="relative group/sub">
                <button type="button" class="w-full flex items-center justify-between px-4 py-2.5 text-xs text-gray-700 group-hover/sub:bg-red-50 group-hover/sub:text-primary text-left transition-colors whitespace-nowrap">
                    <span>Kerja Sama</span>
                    <svg class="w-3.5 h-3.5 shrink-0 ml-2 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Flyout Submenu (Menyatu tanpa celah) -->
                <div class="absolute left-full top-0 w-52 hidden group-hover/sub:block z-50">
                    <div class="bg-white rounded-r-xl rounded-l-none shadow-lg border border-l-gray-100 border-gray-100 py-1.5">
                        <a href="{{ route('profil.pedoman-kerjasama') }}" class="block px-4 py-2.5 text-xs text-gray-700 hover:bg-red-50 hover:text-primary transition-colors">
                            Pedoman Kerja Sama
                        </a>
                        <a href="{{ route('profil.daftar-kerjasama') }}" class="block px-4 py-2.5 text-xs text-gray-700 hover:bg-red-50 hover:text-primary transition-colors">
                            Daftar Kerja Sama
                        </a>
                        <a href="{{ route('profil.upload-ia') }}" class="block px-4 py-2.5 text-xs text-gray-700 hover:bg-red-50 hover:text-primary transition-colors">
                            Upload IA
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ route('profil.sdm') }}" class="block px-4 py-2.5 text-xs text-gray-700 hover:bg-red-50 hover:text-primary transition-colors">Sumber Daya Manusia</a>
                        </div>
                    </div>
                </div>

                <!-- AKADEMIK -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                        <span>AKADEMIK</span>
                        <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-48 hidden group-hover:block z-50">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 normal-case font-medium">
                            <a href="{{ route('home') }}#prodi-section" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Program Studi</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Kalender Akademik</a>
                        </div>
                    </div>
                </div>

                <!-- KEMAHASISWAAN & ALUMNI -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                        <span>KEMAHASISWAAN & ALUMNI</span>
                        <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-52 hidden group-hover:block z-50">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 normal-case font-medium">
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Organisasi Mahasiswa</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Prestasi Mahasiswa</a>
                        </div>
                    </div>
                </div>

                <!-- TRI DHARMA -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                        <span>TRI DHARMA</span>
                        <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-52 hidden group-hover:block z-50">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 normal-case font-medium">
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Penelitian</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Pengabdian Masyarakat</a>
                        </div>
                    </div>
                </div>

                <!-- LAYANAN -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                        <span>LAYANAN</span>
                        <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-48 hidden group-hover:block z-50">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 normal-case font-medium">
                            <a href="https://siakad.uds.ac.id" target="_blank" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">SIAKAD</a>
                            <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Download Panduan</a>
                        </div>
                    </div>
                </div>

                <!-- INFORMASI -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                        <span>INFORMASI</span>
                        <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                    </button>
                    <div class="absolute right-0 top-full pt-2 w-44 hidden group-hover:block z-50">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 normal-case font-medium">
                            <a href="{{ route('berita.index') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Berita</a>
                            <a href="{{ route('berita.index', ['kategori' => 'Pengumuman']) }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Pengumuman</a>
                            <a href="{{ route('berita.index', ['kategori' => 'Agenda']) }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Agenda</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Sisi Kanan: Tombol Pendaftaran & Toggle Mobile -->
            <div class="flex items-center gap-3 shrink-0">
                <a href="https://pmb.uds.ac.id" target="_blank" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all shadow-sm">
                    <span>Pendaftaran</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>

                <button @click="mobileMenu = !mobileMenu" type="button" class="xl:hidden p-2 rounded-xl text-gray-700 hover:bg-gray-100 focus:outline-none">
                    <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenu" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div x-show="mobileMenu" x-cloak class="xl:hidden bg-white border-t border-gray-100 px-6 py-4 space-y-2 shadow-lg">
            <a href="{{ route('home') }}" class="block py-2 text-xs font-bold uppercase text-gray-700 hover:text-primary">Home</a>
            
                            <div x-data="{ openKerjasama: false }" class="pl-3">
                    <button @click="openKerjasama = !openKerjasama" type="button" class="w-full flex items-center justify-between py-1.5 text-xs font-medium text-gray-600 hover:text-primary">
                        <span>Kerja Sama</span>
                        <svg class="w-3.5 h-3.5 transition-transform" :class="{ 'rotate-180': openKerjasama }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="openKerjasama" x-cloak class="pl-4 space-y-1 border-l-2 border-red-100 ml-1 mt-1">
                        <a href="{{ route('profil.pedoman-kerjasama') }}" class="block py-1 text-xs text-gray-500 hover:text-primary">Pedoman Kerja Sama</a>
                        <a href="{{ route('profil.daftar-kerjasama') }}" class="block py-1 text-xs text-gray-500 hover:text-primary">Daftar Kerja Sama</a>
                        <a href="{{ route('profil.upload-ia') }}" class="block py-1 text-xs text-gray-500 hover:text-primary">Upload IA</a>
                    </div>
                </div>
                <a href="{{ route('profil.sdm') }}" class="block pl-3 py-1.5 text-xs font-medium text-gray-600 hover:text-primary">Sumber Daya Manusia</a>
            <a href="{{ route('profil.pimpinan') }}" class="block py-1.5 pl-3 text-xs font-medium text-gray-600 hover:text-primary">Pimpinan Fakultas</a>
            <a href="{{ route('profil.visi-misi') }}" class="block py-1.5 pl-3 text-xs font-medium text-gray-600 hover:text-primary">Visi, Misi & Tujuan</a>
            <a href="{{ route('home') }}#prodi-section" @click="mobileMenu = false" class="block py-2 text-xs font-bold uppercase text-gray-700 hover:text-primary">Program Studi</a>
            <a href="{{ route('berita.index') }}" class="block py-2 text-xs font-bold uppercase text-gray-700 hover:text-primary">Informasi & Berita</a>
            <a href="{{ route('kontak') }}" class="block py-2 text-xs font-bold uppercase text-gray-700 hover:text-primary">Kontak</a>
        </div>
    </header>

    <!-- Konten Utama Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-100 py-10 mt-20 bg-[#7A1C28]">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-white">&copy; {{ date('Y') }} Fakultas Ilmu Kesehatan - Universitas dr. Soebandi. All rights reserved.</p>
            <div class="flex items-center gap-6 text-sm text-white font-medium">
                <a href="{{ route('profil.visi-misi') }}" class="hover:text-red-200 transition-colors">Tentang FIKES</a>
                <a href="{{ route('berita.index') }}" class="hover:text-red-200 transition-colors">Warta Kampus</a>
                <a href="{{ route('kontak') }}" class="hover:text-red-200 transition-colors">Kontak</a>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Widget (2 Kontak) -->
    <div x-data="{ waOpen: false }" class="fixed bottom-6 right-6 z-[9999] flex flex-col items-end pointer-events-auto">
        
        <!-- Pop-up Pilihan Kontak WhatsApp -->
        <div x-show="waOpen" 
             x-cloak
             @click.outside="waOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             class="mb-3 w-72 sm:w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden text-left">
            
            <!-- Header Pop-up -->
            <div class="bg-[#7A1C28] p-4 text-white flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center">
                        <svg class="w-5 h-5 fill-current text-emerald-400" viewBox="0 0 24 24">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.531 1.768.784 2.791.784 3.181 0 5.767-2.586 5.767-5.766.001-3.18-2.585-5.77-5.767-5.77zm3.377 8.219c-.145.405-.729.743-1.02.779-.271.033-.615.147-2.029-.441-1.636-.682-2.697-2.339-2.779-2.45-.082-.11-1.666-2.215-1.666-4.225 0-2.009 1.054-2.998 1.428-3.373.374-.374.819-.468 1.092-.468.273 0 .546.006.786.017.253.012.592-.096.927.708.345.828 1.178 2.875 1.282 3.088.104.213.174.463.035.738-.139.275-.209.447-.414.686-.205.239-.433.534-.619.717-.206.203-.42.424-.181.834.239.41 1.063 1.752 2.28 2.836 1.564 1.393 2.885 1.826 3.295 2.03.41.204.65.171.891-.104.241-.275 1.025-1.196 1.3-1.606.275-.41.55-.342.924-.204.375.138 2.378 1.121 2.787 1.325.41.204.683.307.784.478.101.171.101.99-.044 1.395z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold leading-tight">Layanan FIKES UDS</h4>
                        <p class="text-[11px] text-gray-200">Hubungi kami via WhatsApp</p>
                    </div>
                </div>
                <button @click="waOpen = false" class="text-white/70 hover:text-white p-1 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- List Nomor WA -->
            <div class="p-3 bg-gray-50/70 space-y-2">
                <!-- Kontak 1: PMB -->
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20PMB%20FIKES%20UDS,%20saya%20ingin%20bertanya%20informasi%20pendaftaran." 
                   target="_blank" 
                   class="flex items-center gap-3 p-3 bg-white hover:bg-emerald-50/50 rounded-xl border border-gray-100 hover:border-emerald-200 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-gray-800 group-hover:text-emerald-700">Pendaftaran Mahasiswa (PMB)</p>
                        <p class="text-[11px] text-gray-500 truncate">Informasi pendaftaran & beasiswa</p>
                    </div>
                </a>

                <!-- Kontak 2: Sekretariat Fakultas -->
                <a href="https://wa.me/6289876543210?text=Halo%20Sekretariat%20FIKES%20UDS,%20saya%20ingin%20bertanya%20layanan%20akademik." 
                   target="_blank" 
                   class="flex items-center gap-3 p-3 bg-white hover:bg-red-50/50 rounded-xl border border-gray-100 hover:border-red-200 transition-all group">
                    <div class="w-10 h-10 rounded-xl bg-red-100 text-[#7A1C28] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-gray-800 group-hover:text-[#7A1C28]">Layanan Akademik & Fakultas</p>
                        <p class="text-[11px] text-gray-500 truncate">Info prodi, dosen, dan kemahasiswaan</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tombol Hijau Bulat Melayang -->
        <button @click="waOpen = !waOpen" 
                type="button"
                aria-label="Kontak WhatsApp"
                class="w-14 h-14 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-2xl hover:shadow-emerald-500/40 transition-all duration-300 hover:scale-105 focus:outline-none ring-4 ring-white/80 cursor-pointer">
            <svg x-show="!waOpen" class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
            </svg>
            <svg x-show="waOpen" x-cloak class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

</body>
</html>