<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dosen;
use App\Models\ProfilFakultas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RencanaPengembangan;
use App\Models\PengaturanKerjasama;
use App\Models\DaftarKerjasama;
use App\Models\SumberDayaManusia;
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

    // Halaman Visi & Misi
  public function visiMisi()
{
    $visiMisi = DB::table('visi_misis')->where('is_aktif', true)->latest()->first()
                ?? DB::table('visi_misis')->latest()->first();

    return view('pages.visi-misi', compact('visiMisi'));
}

    // Halaman Struktur Organisasi
    public function struktur()
    {
        $struktur = \App\Models\StrukturOrganisasi::where('is_aktif', true)->latest()->first();

    return view('pages.struktur-organisasi', compact('struktur'));
    }

    // Halaman Daftar Dosen
    public function dosen()
    {
        $dosens = Dosen::with('programStudi')->get();
        return view('pages.profil.dosen', compact('dosens'));
    }

    public function pimpinan()
{
    $pimpinans = ProfilFakultas::orderByRaw("
        CASE 
            WHEN jabatan LIKE '%Dekan%' AND jabatan NOT LIKE '%Wakil%' THEN 1
            WHEN jabatan LIKE '%Wakil Dekan I' OR jabatan LIKE '%Wakil Dekan 1%' THEN 2
            WHEN jabatan LIKE '%Wakil Dekan II' OR jabatan LIKE '%Wakil Dekan 2%' THEN 3
            WHEN jabatan LIKE '%Wakil Dekan III' OR jabatan LIKE '%Wakil Dekan 3%' THEN 4
            ELSE 5
        END ASC
    ")->get();

    return view('pages.pimpinan', compact('pimpinans'));
}

    // Halaman Kontak
    public function kontak()
    {
        return view('pages.kontak');
    }

    public function renstra()
{
    $dokumen = RencanaPengembangan::where('kategori', 'renstra')
        ->where('is_aktif', true)
        ->latest()
        ->first();

    return view('pages.rencana-pengembangan', [
        'dokumen' => $dokumen,
        'pageTitle' => 'Rencana Strategis (Renstra)',
        'pageSubtitle' => 'Arah kebijakan dan strategi pengembangan jangka menengah Fakultas Ilmu Kesehatan Universitas dr. Soebandi',
    ]);
}

public function renop()
{
    $dokumen = RencanaPengembangan::where('kategori', 'renop')
        ->where('is_aktif', true)
        ->latest()
        ->first();

    return view('pages.rencana-pengembangan', [
        'dokumen' => $dokumen,
        'pageTitle' => 'Rencana Operasional (Renop)',
        'pageSubtitle' => 'Penjabaran program kerja dan target operasional tahunan Fakultas Ilmu Kesehatan Universitas dr. Soebandi',
    ]);
}
   public function pedomanKerjasama()
{
    $pengaturan = PengaturanKerjasama::latest()->first();
    return view('pages.pedoman-kerjasama', compact('pengaturan'));
}

public function daftarKerjasama()
{
    $dalamNegeri = DaftarKerjasama::where('tingkat', 'dalam_negeri')->orderBy('nama_mitra')->get();
    $luarNegeri = DaftarKerjasama::where('tingkat', 'luar_negeri')->orderBy('nama_mitra')->get();

    return view('pages.daftar-kerjasama', compact('dalamNegeri', 'luarNegeri'));
}

public function uploadIa()
{
    $pengaturan = PengaturanKerjasama::latest()->first();
    return view('pages.upload-ia', compact('pengaturan'));
}
public function sumberDayaManusia()
{
    $dokumen = SumberDayaManusia::where('is_aktif', true)
        ->latest()
        ->first();

    return view('pages.sumber-daya-manusia', compact('dokumen'));
}
}
