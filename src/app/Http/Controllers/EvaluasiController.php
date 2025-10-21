<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Konten;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
     public function index()
    {
        $evaluasi = Evaluasi::all();
        $konten = Konten::where('nama', 'Konten')->first();
        return view('dokumenevaluasi.index', compact('evaluasi','konten'));
    }
}
