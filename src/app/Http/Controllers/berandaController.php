<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Pimpinan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $pimpinan = Pimpinan::first();
    //artikel
    $artikel = Artikel::latest()
                ->take(4)
                ->get();
    //berita kota tasikmalaya
    $beritatasik = Berita::whereHas('kategori', function($q) {
                $q->where('nama', 'Berita Kota Tasikmalaya');})
                ->latest()
                ->first();
    $beritalaintasik = Berita::whereHas('kategori', function($q) {
                $q->where('nama', 'Berita Kota Tasikmalaya');})
                    ->latest()
                    ->skip(1)
                    ->take(2)
                    ->get();
    //berita dppkbp3a
    $berita = Berita::whereHas('kategori', function($q) {
                $q->where('nama', 'Berita DPPKBP3A');})
                ->latest()
                ->first();
    $beritalain = Berita::whereHas('kategori', function($q) {
                $q->where('nama', 'Berita DPPKBP3A');})
                    ->latest()
                    ->skip(1)
                    ->take(2)
                    ->get();
    return view('beranda.index', compact('pimpinan','artikel','berita','beritatasik', 'beritalain','beritalaintasik'));
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
