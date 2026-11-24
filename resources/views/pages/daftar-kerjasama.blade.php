@extends('layouts.app')

@section('title', 'Daftar Kerja Sama - FIKES Universitas dr. Soebandi')

@section('content')
<main class="w-full bg-slate-50/60 py-12 sm:py-16" x-data="{ tab: 'dalam', search: '' }">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <div class="text-center space-y-3 max-w-3xl mx-auto">
            <span class="inline-block px-3.5 py-1 text-xs font-semibold tracking-wider text-[#7A1C28] uppercase bg-red-50 border border-red-100 rounded-full">
                Kerja Sama
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                Daftar Kerja Sama Mitra
            </h1>
            <p class="text-sm sm:text-base text-gray-600">
                Jejaring kemitraan dalam negeri dan luar negeri Fakultas Ilmu Kesehatan Universitas dr. Soebandi
            </p>
        </div>

        <!-- Tab & Pencarian -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-gray-200/80 shadow-xs">
            <div class="flex items-center gap-2 bg-gray-100 p-1 rounded-xl w-full sm:w-auto">
                <button @click="tab = 'dalam'" type="button"
                        :class="tab === 'dalam' ? 'bg-[#7A1C28] text-white shadow-xs' : 'text-gray-600 hover:text-gray-900'"
                        class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition-colors">
                    Dalam Negeri ({{ $dalamNegeri->count() }})
                </button>
                <button @click="tab = 'luar'" type="button"
                        :class="tab === 'luar' ? 'bg-[#7A1C28] text-white shadow-xs' : 'text-gray-600 hover:text-gray-900'"
                        class="flex-1 sm:flex-none px-4 py-2 rounded-lg text-xs font-bold transition-colors">
                    Luar Negeri ({{ $luarNegeri->count() }})
                </button>
            </div>

            <input type="text" x-model="search" placeholder="Cari nama mitra atau dokumen..."
                   class="w-full sm:w-72 px-4 py-2 text-xs rounded-xl border border-gray-200 focus:border-[#7A1C28] focus:ring-0 outline-none">
        </div>

        <!-- Tabel Dalam Negeri -->
        <div x-show="tab === 'dalam'" class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-[11px] font-bold uppercase tracking-wider text-gray-600">
                            <th class="px-5 py-4 w-12 text-center">No</th>
                            <th class="px-5 py-4">Nama Mitra / Instansi</th>
                            <th class="px-5 py-4">Dokumen</th>
                            <th class="px-5 py-4">Bidang Kerja Sama</th>
                            <th class="px-5 py-4 text-center">Masa Berlaku</th>
                            <th class="px-5 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-700">
                        @forelse($dalamNegeri as $item)
                            <tr x-show="search === '' || '{{ strtolower($item->nama_mitra . ' ' . $item->jenis_dokumen . ' ' . $item->bidang_kerjasama) }}'.includes(search.toLowerCase())"
                                class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-3.5 text-center font-medium text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-5 py-3.5 font-semibold text-gray-900">{{ $item->nama_mitra }}</td>
                                <td class="px-5 py-3.5">{{ $item->jenis_dokumen ?? '-' }}</td>
                                <td class="px-5 py-3.5">{{ $item->bidang_kerjasama ?? '-' }}</td>
                                <td class="px-5 py-3.5 text-center whitespace-nowrap">
                                    {{ $item->tahun_mulai ?? '-' }} {{ $item->tahun_berakhir ? '– ' . $item->tahun_berakhir : '' }}
                                </td>
                                <td class="px-5 py-3.5 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold {{ $item->status === 'Aktif' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-5 py-10 text-center text-gray-400">Belum ada data kerja sama dalam negeri.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Luar Negeri -->
        <div x-show="tab === 'luar'" x-cloak class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-[11px] font-bold uppercase tracking-wider text-gray-600">
                            <th class="px-5 py-4 w-12 text-center">No</th>
                            <th class="px-5 py-4">Nama Mitra / Instansi</th>
                            <th class="px-5 py-4">Dokumen</th>
                            <th class="px-5 py-4">Bidang Kerja Sama</th>
                            <th class="px-5 py-4 text-center">Masa Berlaku</th>
                            <th class="px-5 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-700">
                        @forelse($luarNegeri as $item)
                            <tr x-show="search === '' || '{{ strtolower($item->nama_mitra . ' ' . $item->jenis_dokumen . ' ' . $item->bidang_kerjasama) }}'.includes(search.toLowerCase())"
                                class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-5 py-3.5 text-center font-medium text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-5 py-3.5 font-semibold text-gray-900">{{ $item->nama_mitra }}</td>
                                <td class="px-5 py-3.5">{{ $item->jenis_dokumen ?? '-' }}</td>
                                <td class="px-5 py-3.5">{{ $item->bidang_kerjasama ?? '-' }}</td>
                                <td class="px-5 py-3.5 text-center whitespace-nowrap">
                                    {{ $item->tahun_mulai ?? '-' }} {{ $item->tahun_berakhir ? '– ' . $item->tahun_berakhir : '' }}
                                </td>
                                <td class="px-5 py-3.5 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold {{ $item->status === 'Aktif' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-5 py-10 text-center text-gray-400">Belum ada data kerja sama luar negeri.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection