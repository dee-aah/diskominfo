<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::with('kategori')->latest()->get();
        $kategoris = Kategori::all();
        return view('beritakita.index', compact('beritas', 'kategoris'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
        'kategori_id' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

    $filename = null;
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->storeAs('berita', $filename);
    }

    Berita::create([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'penulis' => $request->penulis,
        'tag' => $request->tag,
        'kategori_id' => $request->kategori_id,
        'gambar' => $filename
    ]);

    return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $berita = Berita::findOrFail($id);
    $kategoris = Kategori::all();
    return view('berita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $berita = Berita::findOrFail($id);

    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'required',
        'tag' => 'nullable',
        'kategori_id' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/berita', $filename);
        if ($berita->gambar) {
            Storage::delete('public/berita/' . $berita->gambar);
        }
        $berita->gambar = $filename;
    }

    $berita->update($request->only(['judul', 'isi', 'penulis', 'tag', 'kategori_id']));

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $berita = Berita::findOrFail($id);
    if ($berita->gambar) {
        Storage::delete('public/berita/' . $berita->gambar);
    }
    $berita->delete();

    return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }
}
