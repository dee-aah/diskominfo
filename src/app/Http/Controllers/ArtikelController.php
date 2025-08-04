<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
        //
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
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/artikel', $filename);
        }

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'tag' => $request->tag,
            'gambar' => $filename,
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan');
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

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/artikel', $filename);
            if ($artikel->gambar) {
                Storage::delete('public/artikel/' . $artikel->gambar);
            }
            $artikel->gambar = $filename;
        }

        $artikel->update($request->only(['judul', 'isi', 'penulis', 'tag']));

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
}
