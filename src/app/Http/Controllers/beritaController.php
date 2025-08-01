<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berita;

class beritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('berita.index', compact('beritas'));

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
        'tag' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
    ]);

    $filename = null;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = strtolower($file->getClientOriginalName());
        $file->storeAs('public/berita', $filename);
    }

    Berita::create([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'penulis' => $request->penulis,
        'tag' => $request->tag,
        'gambar' => $filename ? 'berita/' . $filename : null,
    ]);

    return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
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
    return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'penulis' => 'required',
        'tag' => 'required',
        'gambar' => 'nullable|image|max:10240',
    ]);

    $berita = Berita::findOrFail($id);

    $data = $request->only(['judul', 'isi', 'penulis', 'tag']);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = strtolower($file->getClientOriginalName());
        $file->storeAs('public/berita', $filename);
        $data['gambar'] = 'berita/' . $filename;
    }

    $berita->update($data);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $berita = Berita::findOrFail($id);
    $berita->delete();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
