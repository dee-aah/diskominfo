<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class beritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::with('kategori')->latest()->get();
        $kategoris = Kategori::all();

        return view('berita.index', compact('beritas', 'kategoris'));

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
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'required|string|max:100',
            'tag' => 'nullable|string',
            'kategori_id' => 'nullable|exists:kategori,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'penulis', 'tag', 'kategori_id']);

        if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $namaGambar = $file->getClientOriginalName(); // nama asli tanpa diubah

        // Pindahkan ke folder public/berita
        $tujuanPath = public_path('berita'); // = public/berita
        $file->move($tujuanPath, $namaGambar); // simpan file

        // Simpan nama gambar ke database (relatif terhadap public)
        $data['gambar'] = 'berita/' . $namaGambar;
    }

        Berita::create($data);

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
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'required|string|max:100',
            'tag' => 'nullable|string',
            'kategori_id' => 'nullable|exists:kategori,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'penulis', 'tag', 'kategori_id']);
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
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

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
