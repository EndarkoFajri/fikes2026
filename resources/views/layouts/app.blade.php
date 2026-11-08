<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fakultas Ilmu Kesehatan - Universitas dr. Soebandi</title>
    <style>
    [x-cloak] { display: none !important; }
</style>
    <!-- Google Fonts: Plus Jakarta Sans / Inter -->
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
                        primary: '#7A1C28', // Warna Maroon khas desain Figma
                        'primary-dark': '#63141F',
                    }
                }
            }
        }
        
    </script>
</head>
<body class="font-sans bg-[#FBFBFC] text-gray-800 antialiased selection:bg-red-100 selection:text-primary">

    <!-- Header / Navbar Resmi FIKES UDS -->
<header class="w-full bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="w-full max-w-350 mx-auto px-6 sm:px-10 lg:px-14 h-20 flex items-center justify-between gap-4">
        <!-- Brand Logo & Nama -->
<a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 ml-4 lg:ml-6 text-decoration-none">
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
                <button class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                    <span>PROFIL</span>
                    <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </button>
                <div class="absolute left-0 mt-2 w-52 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden group-hover:block normal-case font-medium">
                    <a href="{{ route('profil.sejarah') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Sejarah Singkat</a>
                    <a href="{{ route('profil.visi-misi') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Visi, Misi & Tujuan</a>
                    <a href="{{ route('profil.dosen') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Dosen & Pengajar</a>
                </div>
            </div>

            <!-- AKADEMIK -->
            <div class="relative group py-2">
                <button class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                    <span>AKADEMIK</span>
                    <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </button>
                <div class="absolute left-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden group-hover:block normal-case font-medium">
                    <a href="#prodi-section" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Program Studi</a>
                    <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Kalender Akademik</a>
                </div>
            </div>

            <!-- KEMAHASISWAAN & ALUMNI -->
            <div class="relative group py-2">
                <button class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                    <span>KEMAHASISWAAN & ALUMNI</span>
                    <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </button>
                <div class="absolute left-0 mt-2 w-52 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden group-hover:block normal-case font-medium">
                    <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Organisasi Mahasiswa</a>
                    <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Prestasi Mahasiswa</a>
                </div>
            </div>

            <!-- TRI DHARMA -->
            <div class="relative group py-2">
                <button class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                    <span>TRI DHARMA</span>
                    <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </button>
                <div class="absolute left-0 mt-2 w-52 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden group-hover:block normal-case font-medium">
                    <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Penelitian</a>
                    <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Pengabdian Masyarakat</a>
                </div>
            </div>

            <!-- LAYANAN -->
            <div class="relative group py-2">
                <button class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                    <span>LAYANAN</span>
                    <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </button>
                <div class="absolute left-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden group-hover:block normal-case font-medium">
                    <a href="https://siakad.uds.ac.id" target="_blank" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">SIAKAD</a>
                    <a href="#" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Download Panduan</a>
                </div>
            </div>

            <!-- INFORMASI -->
            <div class="relative group py-2">
                <button class="flex items-center gap-1 hover:text-primary transition-colors focus:outline-none">
                    <span>INFORMASI</span>
                    <svg class="w-3.5 h-3.5 fill-current opacity-70 group-hover:rotate-180 transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                </button>
                <div class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg border border-gray-100 py-2 hidden group-hover:block normal-case font-medium">
                    <a href="{{ route('berita.index') }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Berita</a>
                    <a href="{{ route('berita.index', ['kategori' => 'Pengumuman']) }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Pengumuman</a>
                    <a href="{{ route('berita.index', ['kategori' => 'Agenda']) }}" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 hover:text-primary">Agenda</a>
                </div>
            </div>
        </nav>

        <!-- Sisi Kanan: Search & Tombol Pendaftaran Sejajar -->
        <div class="flex items-center gap-3 shrink-0">
            
            <a href="https://pmb.uds.ac.id" target="_blank" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition-all shadow-sm">
                <span>Pendaftaran</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

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
                <a href="{{ route('profil.visi-misi') }}" class="hover:text-primary">Tentang FIKES</a>
                <a href="{{ route('berita.index') }}" class="hover:text-primary">Warta Kampus</a>
                <a href="{{ route('kontak') }}" class="hover:text-primary">Kontak</a>
            </div>
        </div>
    </footer>

</body>
</html>