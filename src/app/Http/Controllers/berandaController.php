<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use Illuminate\Http\Request;

class berandaController extends Controller
{
    public function index()
    {
    $artikel = Artikel::latest()->first();
    $artikellain = Artikel::where('id', '!=', optional($artikel)->id)
                    ->latest()
                    ->take(5)
                    ->get();
    $berita = Berita::latest()->first();
    $beritalain = Berita::where('id', '!=', optional($berita)->id)
                    ->latest()
                    ->take(5)
                    ->get();
    return view('beranda.index', compact('artikel','berita', 'artikellain','beritalain'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
