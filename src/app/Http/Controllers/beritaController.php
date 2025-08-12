<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

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
    public function kategori_brt($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $beritas = Berita::where('kategori_id', $kategori->id)
            ->latest()
            ->paginate(6);

        return view('beritakita.kategori_berita', compact('kategori', 'beritas'));
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query utama
        $query = Berita::with('kategori');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('tag', 'like', "%{$search}%");
            });
        }

        $kategoris = Kategori::where('type', 'Berita')
            ->with(['beritas' => function ($query) {
                $query->latest()->take(3); // Ambil 3 artikel terbaru per kategori
            }])->get();
        // berita populer
        $beritapopuler = Berita::whereHas('kategori', function ($query) {
            $query->whereIn('nama', [
                'Berita Dinas DPPKBP3A',
                'Pengendalian Penduduk',
                'Keluarga Berencana',
                'Pemberdayaan Perempuan',
                'Perlindungan Anak'
            ]);
        })
            ->orderBy('view_count', 'desc')
            ->take(4)
            ->get();

        $beritapopulertasik = Berita::whereHas('kategori', function ($query) {
            $query->where('nama', ['Berita Kota Tasikmalaya']);
        })
            ->orderBy('view_count', 'desc')
            ->take(4)
            ->get();


        // Berita terbaru
        $beritaterbaru = Berita::whereHas('kategori', function ($query) {
            $query->whereIn('nama', [
                'Berita Dinas DPPKBP3A',
                'Pengendalian Penduduk',
                'Keluarga Berencana',
                'Pemberdayaan Perempuan',
                'Perlindungan Anak'
            ]);
        })
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $beritaterbarutasik = Berita::whereHas('kategori', function ($query) {
            $query->where('nama', ['Berita Kota Tasikmalaya']);
        })
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();
        //berita lain
        $beritalain = Berita::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->whereIn('nama', [
                    'Berita Dinas DPPKBP3A',
                    'Pengendalian Penduduk',
                    'Keluarga Berencana',
                    'Pemberdayaan Perempuan',
                    'Perlindungan Anak'
                ]);
            })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $beritalaintasik = Berita::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->whereIn('nama', ['Berita Kota Tasikmalaya']);
            })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        //selengkapnya
        $beritaselengkapnyatasik = Berita::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->whereIn('nama', ['Berita Kota Tasikmalaya']);
            })
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        $beritaselengkapnya = Berita::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->whereIn('nama', [
                    'Berita Dinas DPPKBP3A',
                    'Pengendalian Penduduk',
                    'Keluarga Berencana',
                    'Pemberdayaan Perempuan',
                    'Perlindungan Anak'
                ]);
            })
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();

        return view('beritakita.index', compact('beritalain', 'beritalaintasik', 'beritaselengkapnyatasik', 'beritaselengkapnya', 'beritaterbaru', 'beritaterbarutasik', 'beritapopuler', 'beritapopulertasik', 'search', 'kategoris'));
    }
    public function boot()
    {
        Paginator::useBootstrapFive(); // kalau mau Bootstrap
        // atau biarkan default untuk Tailwind
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
            'waktu' => 'required',
            'slug' => 'required',
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
            'waktu' => $request->waktu,
            'slug' => $request->slug,
            'tag' => $request->tag,
            'kategori_id' => $request->kategori_id,
            'gambar' => $filename
        ]);
        $tags = explode(',', $request->tag);
        $tags = array_map('trim', $tags);
        return redirect()->route('beritakita.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
    }
    public function show($slug)
    {
        $berita = Berita::with('kategori')->where('slug', $slug)->firstOrFail();
        Carbon::setLocale('id');
        $berita->waktu = Carbon::parse($berita->waktu);
        $beritaTerkait = Berita::with('kategori')
            ->where('kategori_id', $berita->kategori_id)
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        return view('beritakita.show', compact('berita', 'beritaTerkait'));
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
            'waktu' => $request->waktu,
            'slug' => $request->slug,
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
