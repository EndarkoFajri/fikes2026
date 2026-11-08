<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Menampilkan daftar seluruh berita dengan pagination
    public function index(Request $request)
    {
        $kategori = $request->query('kategori');

        $beritas = Berita::when($kategori, function ($query, $kategori) {
                return $query->where('kategori', $kategori);
            })
            ->latest()
            ->paginate(6);

        return view('pages.berita.index', compact('beritas', 'kategori'));
    }

    // Menampilkan isi detail satu berita berdasarkan slug
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        
        // Ambil berita terkait untuk sidebar
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->latest()
            ->take(4)
            ->get();

        return view('pages.berita.show', compact('berita', 'beritaLainnya'));
    }
}