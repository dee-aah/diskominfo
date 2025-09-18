<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
    $query = Artikel::with('kategori');
    $artikellain = Artikel::when(request('d'), function ($query) {
        $query->where('judul', 'like', '%' . request('d') . '%');
    })
    ->latest()
    ->paginate(4);
    // Artikel terbaru untuk 1 di highlight
    $artikelpopuler = Artikel::whereHas('kategori')
    ->orderBy('view_count', 'desc')
    ->take(4)
    ->get();

    return view('artikel.index', compact('artikelpopuler', 'artikellain'));
    }
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $artikel = Artikel::with('kategori')->where('slug', $slug)->firstOrFail();

        $artikelTerkait = Artikel::with('kategori')
        ->where('kategori_id', $artikel->kategori_id)
        ->where('id', '!=', $artikel->id)
        ->latest()
        ->take(5)
        ->get();

    return view('artikel.show', compact('artikel', 'artikelTerkait'));
    }

}
