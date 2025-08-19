<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
      $search = $request->input('search');

    // Query utama
    $query = Artikel::with('kategori');

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('penulis', 'like', "%{$search}%")
              ->orWhere('tag', 'like', "%{$search}%");
        });
    }

    // Artikel terbaru untuk 1 di highlight
    $artikelpopuler = Artikel::whereHas('kategori')
    ->orderBy('view_count', 'desc')
    ->take(4)
    ->get();
    $artikellain = Artikel::with('kategori')
    ->orderBy('created_at', 'desc')
    ->take(4)
    ->get();

    return view('artikel.index', compact('artikelpopuler', 'artikellain', 'search'));
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
