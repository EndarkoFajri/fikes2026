<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function show($slug)
    {
        $prodi = ProgramStudi::with('dosens')->where('slug', $slug)->firstOrFail();
        $semuaProdi = ProgramStudi::where('id', '!=', $prodi->id)->get();

        return view('pages.prodi.show', compact('prodi', 'semuaProdi'));
    }
}