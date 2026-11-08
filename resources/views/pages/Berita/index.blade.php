@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold text-success">Berita & Informasi FIKES UDS</h2>
            <p class="text-muted">Kumpulan rilis berita resmi, pengumuman akademik, dan agenda kegiatan fakultas.</p>
        </div>
        <!-- Filter Kategori -->
        <div class="col-md-4 text-md-end">
            <div class="btn-group" role="group">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-success {{ !$kategori ? 'active' : '' }}">Semua</a>
                <a href="{{ route('berita.index', ['kategori' => 'Berita']) }}" class="btn btn-outline-success {{ $kategori == 'Berita' ? 'active' : '' }}">Berita</a>
                <a href="{{ route('berita.index', ['kategori' => 'Pengumuman']) }}" class="btn btn-outline-success {{ $kategori == 'Pengumuman' ? 'active' : '' }}">Pengumuman</a>
                <a href="{{ route('berita.index', ['kategori' => 'Agenda']) }}" class="btn btn-outline-success {{ $kategori == 'Agenda' ? 'active' : '' }}">Agenda</a>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($beritas as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span>Tidak ada gambar</span>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                            <span class="badge bg-success">{{ $item->kategori }}</span>
                            <small class="text-muted ms-2">{{ $item->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title fw-bold">
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-decoration-none text-dark">
                                {{ Str::limit($item->judul, 60) }}
                            </a>
                        </h5>
                        <div class="card-text text-muted mb-3">
                            {{ Str::limit(strip_tags($item->konten), 90) }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('berita.show', $item->slug) }}" class="btn btn-sm btn-outline-success">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center py-4">Belum ada konten berita pada kategori ini.</div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $beritas->links() }}
    </div>
</div>
@endsection