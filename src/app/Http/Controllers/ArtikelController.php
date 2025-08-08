<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('artikel.index', compact('artikels'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'tag' => 'nullable',
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
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'tag' => $request->tag,
            'gambar' => $filename
        ]);
       return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artikel = Artikel::findOrFail($id);
    return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'tag' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->storeAs('artikel', $filename);
        }

        Artikel::update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'tag' => $request->tag,
            'gambar' => $filename
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui');
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
    $search = $request->input('q');

    $artikel = Artikel::where('judul', 'like', '%' . $search . '%')
        ->orWhere('penulis', 'like', '%' . $search . '%')
        ->orWhere('tag', 'like', '%' . $search . '%')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('artikel.dashboard', compact('artikels'));
    }

}
