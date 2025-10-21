<?php

namespace App\Http\Controllers;

use App\Models\Konten;
use App\Models\Visimisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visi = Visimisi::first();
        $konten = Konten::where('nama', 'Konten')->first();
        return view("visimisi.index", compact('visi','konten'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

}
