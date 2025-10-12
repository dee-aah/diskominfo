<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\LayananDetail;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanann = Layanan::all();
        $layanans = Layanan::all()->groupBy('program');
        $layananlain = Layanan::skip(1)->take(3)->get();
        return view('layanans.index', compact('layanans','layanann','layananlain'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        $layanan->load('layanan_details');
        $layanan_detail = LayananDetail::first();
        return view('layanans.show', compact('layanan','layanan_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */

}
