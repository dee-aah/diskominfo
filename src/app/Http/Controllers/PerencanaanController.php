<?php

namespace App\Http\Controllers;

use App\Models\Perencanaan;
use App\Models\konten;
use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    public function index()
    {
        $perencanaan = Perencanaan::all();
        $konten = Konten::where('nama', 'Konten')->first();
        return view('dokumenperencanaan.index', compact('perencanaan','konten'));
    }
}
