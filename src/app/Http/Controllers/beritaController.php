<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
        // Berita DPPKBP3A
    $beritapopuler = Berita::where('kategori', 'Berita DPPKBP3A')
        ->orderByDesc('view_count')
        ->take(4)
        ->get();

    $beritaterbaru = Berita::where('kategori', 'Berita DPPKBP3A')
        ->orderByDesc('created_at')
        ->take(6)
        ->get();

    $beritalain = $beritaterbaru->take(4);
    $beritaselengkapnya = $beritaterbaru->take(1);
    // Berita Kota Tasikmalaya
    $beritapopulertasik = Berita::where('kategori', 'Berita Kota Tasikmalaya')
        ->orderByDesc('view_count')
        ->take(4)
        ->get();

    $beritaterbarutasik = Berita::where('kategori', 'Berita Kota Tasikmalaya')
        ->orderByDesc('created_at')
        ->take(6)
        ->get();

    $beritalaintasik = $beritaterbarutasik->skip(1)->take(4);
    $beritaselengkapnyatasik = $beritaterbarutasik->take(1);

    $collections = [
        $beritapopuler,
        $beritaterbaru,
        $beritalain,
        $beritaselengkapnya,
        $beritapopulertasik,
        $beritaterbarutasik,
        $beritalaintasik,
        $beritaselengkapnyatasik
    ];

    foreach ($collections as $collection) {
        $collection->transform(function ($berita) {
            $berita->slug_kategori = match ($berita->kategori) {
                'Berita DPPKBP3A' => 'berita-dppkbp3a',
                'Berita Kota Tasikmalaya' => 'berita-kota-tasikmalaya',
                default => 'lainnya'
            };
            return $berita;
        });}

        return view('berita.index', compact(
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
     * Menampilkan detail satu berita.
     */
    public function show($slug)
    {
        // Ambil berita berdasarkan slug
    $berita = Berita::where('slug', $slug)->firstOrFail();

    // Tambah jumlah view
    $berita->increment('view_count');

    // Format tanggal
    Carbon::setLocale('id');
    $berita->waktu_formatted = Carbon::parse($berita->waktu)->translatedFormat('l, d F Y');

    // Ambil berita terkait berdasarkan kategori yang sama
    $beritaTerkait = Berita::where('kategori', $berita->kategori)
        ->where('id', '!=', $berita->id)
        ->latest()
        ->take(5)
        ->get();

    // Kirim ke view
    return view('berita.show', compact('berita', 'beritaTerkait'));
    }

    /**
     * Menampilkan berita berdasarkan kategori.
     */
    public function kategori($kategori)
{
     // Ubah slug ke nama kategori asli
    $kategoriNama = match ($kategori) {
        'berita-kota-tasikmalaya' => 'Berita Kota Tasikmalaya',
        'berita-dppkbp3a' => 'Berita DPPKBP3A',
        default => abort(404),
    };

    // Ambil semua berita sesuai kategori
    $beritas = Berita::where('kategori', $kategoriNama)
        ->orderByDesc('created_at')
        ->paginate(10);

    return view('berita.kategori', compact('kategoriNama', 'beritas'));
}

}
