<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BeritaController extends Controller
{
    /**
     * Menampilkan dashboard manajemen berita dengan paginasi dan fitur pencarian.
     */
    public function dashboard(Request $request)
    {
        $query = Berita::query()->with('kategori'); // Eager load relasi kategori

        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('tag', 'like', "%{$search}%");
            });
        }

        // PERBAIKAN: Menggunakan paginate() untuk performa yang lebih baik
        $beritas = $query->latest()->paginate(15);

        return view('beritakita.dashboard', compact('beritas'));
    }

    /**
     * Menampilkan halaman daftar berita publik (tanpa login).
     * Logika pengambilan data dirapikan agar tidak berulang.
     */
    public function index(Request $request)
    {
        // Daftar nama kategori untuk pemfilteran
        $kategoriDinas = [
            'Berita Dinas DPPKBP3A', 'Pengendalian Penduduk', 'Keluarga Berencana',
            'Pemberdayaan Perempuan', 'Perlindungan Anak'
        ];
        $kategoriTasik = ['Berita Kota Tasikmalaya'];

        // Mengambil semua data yang dibutuhkan dengan satu set query yang efisien
        $beritapopuler = $this->getBeritaByKategori($kategoriDinas, 'view_count', 4);
        $beritapopulertasik = $this->getBeritaByKategori($kategoriTasik, 'view_count', 4);
        $beritaterbaru = $this->getBeritaByKategori($kategoriDinas, 'created_at', 8);
        $beritaterbarutasik = $this->getBeritaByKategori($kategoriTasik, 'created_at', 8);

        // Untuk "Berita Lain" dan "Selengkapnya", kita bisa ambil dari koleksi "terbaru"
        $beritalain = $beritaterbaru->take(4);
        $beritaselengkapnya = $beritaterbaru->take(1);
        $beritalaintasik = $beritaterbarutasik->take(4);
        $beritaselengkapnyatasik = $beritaterbarutasik->take(1);

        return view('beritakita.index', compact(
            'beritapopuler',
            'beritapopulertasik',
            'beritaterbaru',
            'beritaterbarutasik',
            'beritalain',
            'beritalaintasik',
            'beritaselengkapnya',
            'beritaselengkapnyatasik'
        ));
    }

    /**
     * Helper method untuk mengambil berita berdasarkan nama kategori.
     * Ini untuk menghindari penulisan query yang berulang-ulang.
     */
    private function getBeritaByKategori(array $kategoriNames, string $orderByColumn, int $limit)
    {
        return Berita::with('kategori')
            ->whereHas('kategori', function ($query) use ($kategoriNames) {
                $query->whereIn('nama', $kategoriNames);
            })
            ->orderBy($orderByColumn, 'desc')
            ->take($limit)
            ->get();
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        $kategoris = Kategori::where('type', 'Berita')->get();
        return view('beritakita.create', compact('kategoris'));
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penulis' => 'required|string|max:100',
            'waktu' => 'required|date',
            'tag' => 'nullable|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // PERBAIKAN: Beri nama unik dan simpan ke folder public
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/berita', $filename);
        }

        Berita::create($request->except('gambar') + ['gambar' => $filename]);

        return redirect()->route('beritakita.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Menampilkan detail satu berita.
     */
    public function show($slug)
    {
        $berita = Berita::with('kategori')->where('slug', $slug)->firstOrFail();
        $berita->increment('view_count'); // Menambah jumlah view setiap kali berita dibuka

        Carbon::setLocale('id');
        $berita->waktu_formatted = Carbon::parse($berita->waktu)->translatedFormat('l, d F Y');

        $beritaTerkait = Berita::with('kategori')
            ->where('kategori_id', $berita->kategori_id)
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        return view('beritakita.show', compact('berita', 'beritaTerkait'));
    }

    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit(string $id)
    {
        $kategoris = Kategori::where('type', 'Berita')->get();
        $berita = Berita::findOrFail($id);
        return view('beritakita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Memperbarui berita di database.
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $filename = $berita->gambar;
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::delete('public/berita/' . $berita->gambar);
            }
            $file = $request->file('gambar');
            // PERBAIKAN: Beri nama unik dan simpan ke folder public
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/berita', $filename);
        }

        $berita->update($request->except('gambar') + ['gambar' => $filename]);

        return redirect()->route('beritakita.dashboard')->with('success', 'Berita Berhasil Diperbarui');
    }

    /**
     * Menghapus berita dari database.
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

    /**
     * Menampilkan berita berdasarkan kategori.
     */
    public function kategori_brt($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $beritas = Berita::where('kategori_id', $kategori->id)
            ->latest()
            ->paginate(6);

        return view('beritakita.kategori_berita', compact('kategori', 'beritas'));
    }
}
