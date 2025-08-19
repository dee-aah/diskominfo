<?php

namespace App\Http\Controllers\User;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UserArtikelController extends Controller
{
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
        return view('user.artikel.dashboard', compact('artikels'));
    }
    public function create()
    {
        $kategoris = Kategori::where('type', 'artikel')->get();
        return view('user.artikel.create', compact('kategoris'));
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
        return redirect()->route('user.artikel.dashboard')->with('success', 'Artikel berhasil ditambahkan');
    }
    public function edit($id)
    {
        $kategoris = Kategori::where('type', 'artikel')->get();
        $artikel = Artikel::findOrFail($id);
        return view('user.artikel.edit', compact('artikel','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $artikel = Artikel::findOrFail($id);

    if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::delete('public/artikel/' . $artikel->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('artikel', $filename);
        }

    $artikel->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'penulis' => $request->penulis,
        'tag' => $request->tag,
        'kategori_id' => $request->kategori_id,
        'gambar' => $filename
    ]);
        return redirect()->route('user.artikel.dashboard')->with('success', 'Artikel berhasil diperbarui');
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
