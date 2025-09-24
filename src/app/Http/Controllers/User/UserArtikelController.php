<?php

namespace App\Http\Controllers\User;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $artikels = $query->latest()->paginate(5);
        return view('user.artikell.dashboard', compact('artikels'));
    }
    public function create()
    {
        $artikel = Artikel::all();
        $enumValues = DB::select("SHOW COLUMNS FROM artikels WHERE Field = 'kategori'");

        $kategoriOptions = [];
        if (!empty($enumValues)) {
                preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $kategoriOptions = explode("','", $matches[1]);
        }

        return view('user.artikell.create', compact('artikel','kategoriOptions'));
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
            'kategori' => 'required',
            'img' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('artikel', $filename);
        }

        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'tag' => $request->tag,
            'kategori' => $request->kategori,
            'img' => $filename,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('artikell.dashboard')->with('success', 'Artikel berhasil ditambahkan');
    }
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('user.artikell.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $artikel = Artikel::findOrFail($id);
    $filename = $artikel->isIgnoringTimestamps;
    if ($request->hasFile('img')) {
            if ($artikel->img) {
                Storage::delete('public/artikel/' . $artikel->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('artikel', $filename);
        }

    $artikel->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'penulis' => $request->penulis,
        'tag' => $request->tag,
        'kategori' => $request->kategori,
        'img' => $filename
    ]);
        return redirect()->route('artikell.dashboard')->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->img) {
            Storage::delete('public/artikel/' . $artikel->img);
        }
        $artikel->delete();

        return redirect()->back()->with('success', 'Artikel berhasil dihapus');
    }

}
