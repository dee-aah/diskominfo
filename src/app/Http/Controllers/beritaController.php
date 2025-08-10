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
    public function dashboard(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('tag', 'like', "%{$search}%");
            });
        }

        $beritas = $query->latest()->get();
        return view('beritakita.dashboard', compact('beritas'));
    }
    public function kategori($type)
    {
            $kategori = Kategori::where('type', $type)->firstOrFail();
            $beritas = Berita::where('kategori_id', $kategori->id)
                    ->latest()
                    ->paginate(10);

    return view('beritakita.kategori', compact('kategori', 'beritas'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

    // Query utama
    $query = Berita::with('kategori');

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('penulis', 'like', "%{$search}%")
              ->orWhere('tag', 'like', "%{$search}%");
        });
    }

    $kategoris = Kategori::where('type', 'Berita')
    ->with(['beritas' => function ($query) {
        $query->latest()->take(3); // Ambil 3 artikel terbaru per kategori
    }])->get();
    // Artikel terbaru untuk 1 di highlight
    $beritapertama = Berita::latest()->first();

    // Artikel lainnya (skip yang terbaru)
    $beritalain = $query->latest()->take(4)->get();

    // Latest stories
    // Semua kategori
    //$berita = Kategori::all();

    return view('beritakita.index', compact('beritalain', 'beritapertama', 'search', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $kategoris = Kategori::where('type', 'Berita')->get();
        return view('beritakita.create', compact('kategoris'));
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
        'deskripsi' => $request->deskripsi,
        'penulis' => $request->penulis,
        'tag' => $request->tag,
        'kategori_id' => $request->kategori_id,
        'gambar' => $filename
    ]);

    return redirect()->route('beritakita.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
    }
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        $latest = Berita::latest()->take(5)->get();
        return view('beritakita.show', compact('berita', 'latest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = Kategori::where('type', 'Berita')->get();
        $berita = Berita::findOrFail($id);
    return view('beritakita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $berita = Berita::findOrFail($id);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = $file->getClientOriginalName();
        $file->storeAs('berita', $filename);
    } else {
        $filename = $berita->gambar;
    }

    $berita->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'penulis' => $request->penulis,
        'tag' => $request->tag,
        'kategori_id' => $request->kategori_id,
        'gambar' => $filename
    ]);
        return redirect()->route('beritakita.dashboard')->with('success', 'Berita Berhasil Diperbarui');
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

        return redirect()->back()->with('success', 'Berita Berhasil Dihapus');
    }
}
