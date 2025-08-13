<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard(Request $request)
    {
        $query = Artikel::query();

        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('tag', 'like', "%{$search}%");
            });
        }

        $artikels = $query->latest()->get();

        // $artikels = Artikel::latest()->get();
        return view('artikel.dashboard', compact('artikels'));
    }
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
     * Show the form for creating a new resource.
     */
    public function boot()
    {
        Carbon::setLocale('id');
    }
    public function create()
    {
        $kategoris = Kategori::where('type', 'artikel')->get();
        return view('artikel.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'penulis' => 'required',
            'tag' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('artikel', $filename);
        }

        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'tag' => $request->tag,
            'kategori_id' => $request->kategori_id,
            'gambar' => $filename
        ]);
        return redirect()->route('artikel.dashboard')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $artikel = Artikel::with('kategori')->where('slug', $slug)->firstOrFail();
        Carbon::setLocale('id');
        $artikel->waktu = Carbon::parse($artikel->waktu);
        $artikelTerkait = Artikel::with('kategori')
        ->where('kategori_id', $artikel->kategori_id)
        ->where('id', '!=', $artikel->id)
        ->latest()
        ->take(5)
        ->get();

    return view('artikel.show', compact('artikel', 'artikelTerkait'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoris = Kategori::where('type', 'artikel')->get();
        $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', compact('artikel','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $artikel = Artikel::findOrFail($id);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->storeAs('artikel', $filename);
    } else {
        $filename = $artikel->gambar;
    }

    $artikel->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'penulis' => $request->penulis,
        'tag' => $request->tag,
        'kategori_id' => $request->kategori_id,
        'gambar' => $filename
    ]);
        return redirect()->route('artikel.dashboard')->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->gambar) {
            Storage::delete('public/artikel/' . $artikel->gambar);
        }
        $artikel->delete();

        return redirect()->back()->with('success', 'Artikel berhasil dihapus');
    }
    public function searching(Request $request)
    {
      $query = Artikel::query();

    if ($request->filled('keyword')) {
        $query->where('judul', 'like', '%' . $request->keyword . '%')
              ->orWhere('deskripsi', 'like', '%' . $request->keyword . '%');
    }

    if ($request->filled('kategori')) {
        $query->where('kategori_id', $request->kategori);
    }

    $artikels = $query->orderBy('created_at', 'desc')->get();

    return view('artikel.index', [
        'artikels' => $artikels,
        'kategoris' => Kategori::all()
    ]);}
}
