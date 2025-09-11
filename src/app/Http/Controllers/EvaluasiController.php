<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\EvaluasiCont;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
     public function index()
    {
        $evaluasi = Evaluasi::all();
        $evaluasi_cont = EvaluasiCont::first();
        return view('dokumenevaluasi.index', compact('evaluasi','evaluasi_cont'));
    }
}
