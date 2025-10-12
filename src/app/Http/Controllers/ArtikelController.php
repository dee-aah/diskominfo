<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
    ->paginate(6);

    return view('artikel.index', compact( 'artikellain'));
    }
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

    // Tambah jumlah view
    $artikel->increment('view_count');

    // Format tanggal
    Carbon::setLocale('id');
    $artikel->waktu_formatted = Carbon::parse($artikel->waktu)->translatedFormat('l, d F Y');

    // Ambil berita terkait berdasarkan kategori yang sama
    $artikelTerkait = Artikel::where('kategori', $artikel->kategori)
        ->where('id', '!=', $artikel->id)
        ->latest()
        ->take(5)
        ->get();

    // Kirim ke view
    return view('artikel.show', compact('artikel', 'artikelTerkait'));
    }

}
