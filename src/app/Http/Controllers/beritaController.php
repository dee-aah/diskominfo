<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman daftar berita publik (tanpa login).
     * Logika pengambilan data dirapikan agar tidak berulang.
     */
    public function index(Request $request)
    {
        // Daftar nama kategori untuk pemfilteran
        $kategoriDinas = [
            'Berita DPPKBP3A', 'Pengendalian Penduduk', 'Keluarga Berencana',
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
