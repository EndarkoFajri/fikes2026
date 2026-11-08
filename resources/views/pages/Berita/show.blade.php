@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Konten Utama Berita -->
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-success text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-success text-decoration-none">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita->judul, 25) }}</li>
                </ol>
            </nav>

            <h1 class="fw-bold mb-3">{{ $berita->judul }}</h1>
            <div class="text-muted mb-4">
                <span class="badge bg-success me-2">{{ $berita->kategori }}</span>
                <span>Dipublikasikan pada {{ $berita->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
            </div>

            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded-3 mb-4 w-100 shadow-sm" alt="{{ $berita->judul }}" style="max-height: 450px; object-fit: cover;">
            @endif

            <div class="article-content fs-5 lh-lg mb-5 text-secondary">
                {!! $berita->konten !!}
            </div>
        </div>

        <!-- Sidebar Berita Terbaru Lainnya -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-3">
                <h5 class="fw-bold mb-3 border-bottom pb-2">Informasi Lainnya</h5>
                @foreach($beritaLainnya as $lain)
                    <div class="mb-3 pb-2 border-bottom">
                        <small class="text-muted">{{ $lain->created_at->format('d M Y') }}</small>
                        <h6 class="fw-semibold mt-1">
                            <a href="{{ route('berita.show', $lain->slug) }}" class="text-decoration-none text-dark">
                                {{ $lain->judul }}
                            </a>
                        </h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection