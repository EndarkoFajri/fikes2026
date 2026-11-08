<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dosen;
use App\Models\ProfilFakultas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index()
{
    // Ambil 1 berita paling baru untuk ditaruh di kartu besar
    $beritaUtama = Berita::latest()->first();

    // Ambil 5 berita berikutnya untuk kartu-kartu pendukung
    $beritaLainnya = Berita::latest()
        ->when($beritaUtama, function ($query) use ($beritaUtama) {
            return $query->where('id', '!=', $beritaUtama->id);
        })
        ->take(5)
        ->get();

    $prodi = ProgramStudi::all();
    $dekan = ProfilFakultas::first(); // Ambil data profil fakultas (misalnya dekan)
    $galeri = DB::table('galeris')->where('is_aktif', true)
        ->orderBy('urutan', 'asc')
        ->take(6)
        ->get();

    return view('pages.home', compact('beritaUtama', 'beritaLainnya', 'prodi', 'dekan', 'galeri'));
}
    // Halaman Sejarah
    public function sejarah()
    {
        return view('pages.profil.sejarah');
    }

    // Halaman Visi & Misi
    public function visiMisi()
    {
        return view('pages.profil.visi-misi');
    }

    // Halaman Struktur Organisasi
    public function struktur()
    {
        return view('pages.profil.struktur');
    }

    // Halaman Daftar Dosen
    public function dosen()
    {
        $dosens = Dosen::with('programStudi')->get();
        return view('pages.profil.dosen', compact('dosens'));
    }

    // Halaman Kontak
    public function kontak()
    {
        return view('pages.kontak');
    }
}
