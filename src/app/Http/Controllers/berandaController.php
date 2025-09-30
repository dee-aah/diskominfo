<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Konten;
use App\Models\LayananBeranda;
use App\Models\Pimpinan;
use App\Models\SambutanPimpinan;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index()
    {
        $layananBeranda = LayananBeranda::all();

        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dinas_kependudukan_dan_pencatatan_sipil/jumlah_penduduk_berdasarkan_jenis_kelamin_di_kota_tasikmalaya");
        $json = $response->json();
        $datapenduduk = collect($json['data'] ?? []);
        $recordpenduduk = $datapenduduk->last();
        $tahunpenduduk  = $recordpenduduk['tahun'] ?? null;
        $penduduktahunterbaru = $datapenduduk->where('tahun', $tahunpenduduk);
        $jumlahlaki = $penduduktahunterbaru->where('jenis_kelamin', 'LAKI-LAKI')->sum('jumlah_penduduk');
        $jumlahperempuan = $penduduktahunterbaru->where('jenis_kelamin', 'PEREMPUAN')->sum('jumlah_penduduk');
        $totalpenduduk = $jumlahlaki + $jumlahperempuan;

        //rasio
        $rasiojeniskelamin = $jumlahperempuan > 0 ? ($jumlahlaki / $jumlahperempuan) * 100 : 0;
        //subur
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jumlah_pasangan_usia_subur_di_kota_tasikmalaya");
        $json = $response->json();
        $datasubur = collect($json['data'] ?? []);
        $recordsuburterbaru = $datasubur->last();
        $tahunsuburterbaru   = $recordsuburterbaru['tahun'] ?? null;
        $datasuburterbaru  = $recordsuburterbaru['jumlah_pasangan_usia_subur'] ?? 0;
        //kb
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jumlah_peserta_keluarga_bencana_kb_aktif_di_kota_tasikmalaya");
        $json = $response->json();
        $datakb = collect($json['data'] ?? []);
        $recordkbterbaru = $datakb->last();
        $tahunkbterbaru = $recordkbterbaru['tahun'] ?? null;
        $datakbterbaru = $recordkbterbaru['jumlah_peserta_keluarga_berencana_aktif'] ?? 0;
        //pemberdayaan gender
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/badan_pusat_statistik_kota_tasikmalaya/indeks_pemberdayaan_gender_di_kota_tasikmalaya");
        $json = $response->json();
        $datapemberdayaan = collect($json['data'] ?? []);
        $recordpemberdayaan = $datapemberdayaan->last();
        $tahunpemberdayaan   = $recordpemberdayaan['tahun'] ?? null;
        $datapemberdayaan  = $recordpemberdayaan['indeks_pemberdayaan_gender'] ?? 0;
        //kekerasan
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_kss_kkrsn_trhdp_prmpn_nk_d_kt_tskmly");
        $json = $response->json();
        $datakasus = collect($json['data'] ?? []);
        $recordkasusterbaru = $datakasus->last();
        $tahunkasusterbaru = $recordkasusterbaru['tahun'] ?? null;
        $datakasusterbaru = $recordkasusterbaru['jumlah_kasus'] ?? 0;
        $konten = Konten::first();
        $sambutan = SambutanPimpinan::first();
        //tentang kami
        $tentang_kami = Tentang::first();
    //artikel
    $artikel = Artikel::latest()
                ->take(4)
                ->get();
    //berita kota tasikmalaya
    $beritatasik = Berita::where('kategori', 'Berita Kota Tasikmalaya')
                ->latest()
                ->first();
    $beritalaintasik = Berita::where('kategori', 'Berita Kota Tasikmalaya')
                    ->latest()
                    ->skip(1)
                    ->take(3)
                    ->get();
    //berita dppkbp3a
    $berita = Berita::where('kategori', 'Berita DPPKBP3A')
                ->latest()
                ->first();
    $beritalain = Berita::where('kategori', 'Berita DPPKBP3A')
                    ->latest()
                    ->skip(1)
                    ->take(3)
                    ->get();
    return view('beranda.index', compact('sambutan','konten','artikel','berita','beritatasik', 'beritalain','beritalaintasik','datasubur',
            'recordsuburterbaru','tentang_kami',
            'rasiojeniskelamin',
            'layananBeranda',
            'tahunsuburterbaru',
            'datasuburterbaru',
            'datakb',
            'datakbterbaru',
            'tahunkbterbaru',
            'recordkbterbaru',
            'datakasus',
            'tahunkasusterbaru',
            'datakasusterbaru',
            'recordkasusterbaru',
            'datapemberdayaan',
            'datapemberdayaan',
            'tahunpemberdayaan',
            'recordpemberdayaan',
            'datapenduduk',
            'tahunpenduduk',
            'jumlahlaki',
            'penduduktahunterbaru',
            'jumlahperempuan',
            'totalpenduduk',
            'recordpenduduk'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
