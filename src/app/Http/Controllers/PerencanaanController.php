<?php

namespace App\Http\Controllers;

use App\Models\Perencanaan;
use App\Models\PerencanaanCont;
use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    public function index()
    {
        $perencanaan = Perencanaan::all();
        $perencanaan_cont = PerencanaanCont::first();
        return view('dokumenperencanaan.index', compact('perencanaan','perencanaan_cont'));
    }
}
