<?php

namespace App\Http\Controllers;

use App\Models\Sektoral;
use App\Models\Sektoral_cont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class SektoralController extends Controller
{
    public function index()
    {
        $sektoral = Sektoral::first();
        $sektoral_card = Sektoral_cont::all();
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
        //kekerasan
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_kss_kkrsn_trhdp_prmpn_nk_d_kt_tskmly");
        $json = $response->json();
        $datakasus = collect($json['data'] ?? []);
        $recordkasusterbaru = $datakasus->last();
        $tahunkasusterbaru = $recordkasusterbaru['tahun'] ?? null;
        $datakasusterbaru = $recordkasusterbaru['jumlah_kasus'] ?? 0;
        //index
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/badan_pusat_statistik_kota_tasikmalaya/indeks_pemberdayaan_gender_di_kota_tasikmalaya");
        $json = $response->json();
        $datapemberdayaan = collect($json['data'] ?? []);
        $recordpemberdayaanterbaru = $datapemberdayaan->last();
        $tahunpemberdayaanterbaru   = $recordpemberdayaanterbaru['tahun'] ?? null;
        $datapemberdayaanterbaru  = $recordpemberdayaanterbaru['indeks_pemberdayaan_gender'] ?? 0;

        return view('sektoral.index',compact(
            'sektoral',
            'sektoral_card',
            'datasubur',
            'recordsuburterbaru',
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
            'tahunpemberdayaanterbaru',
            'datapemberdayaanterbaru',
            'recordpemberdayaanterbaru'
            ));
    }
    public function kasus()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_kss_kkrsn_trhdp_prmpn_nk_d_kt_tskmly");
        $data = collect($response->json()['data'] ?? []);

        $groupedByYear = $data->groupBy('tahun');

    // Untuk grafik: ambil list tahun & total kasus per tahun
    $tahunList = $groupedByYear->keys();
    $totalKasusPerTahun = $groupedByYear->map(function ($items) {
        return $items->sum('jumlah_kasus');
    })->values();

    return view('sektoral.kasus', compact('data','groupedByYear', 'tahunList', 'totalKasusPerTahun'));
    }
    public function jenisKekerasan()
{
    $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_kss_kkrsn_trhdp_prmpn_nk_brdsrkn_jns_kkrsn_d_kt_tskmly");

    // Ambil semua data (tanpa pagination)
    $datakasus = collect($response->json()['data'] ?? []);
    // Cari tahun terbaru
    $latestYear = $datakasus->max('tahun');

    // Filter hanya tahun terbaru
    $datakasus = $datakasus->where('tahun', $latestYear)->values();

    // Ambil daftar jenis kekerasan unik
    $KecamatanList = $datakasus->pluck('jenis_kekerasan')->unique()->values();

    // Dataset hanya untuk tahun terbaru
    $datasets = collect([[
        'label' => $latestYear,
        'data' => $KecamatanList->map(function ($kec) use ($datakasus, $latestYear) {
            return $datakasus
                ->where('jenis_kekerasan', $kec)
                ->where('tahun', $latestYear)
                ->sum('jumlah_kasus');
        }),
    ]]);

    return view('sektoral.jenisKekerasan', compact(
        'datakasus',
        'datasets',
        'KecamatanList',
        'latestYear'
    ));


}

    public function PasanganSubur()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jumlah_pasangan_usia_subur_di_kota_tasikmalaya");
        $datasubur = collect($response->json()['data'] ?? []);

        $groupedByYear = $datasubur->groupBy('tahun');
        $tahunList = $groupedByYear->keys();
        $totalSuburPerTahun = $groupedByYear->map(function ($items) {
            return $items->sum('jumlah_pasangan_usia_subur');
            })->values();

    return view('sektoral.PasanganSubur', compact('datasubur','groupedByYear', 'tahunList', 'totalSuburPerTahun'));
    }
    public function PasanganSuburKecamatan()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_psngn_s_sbr_brdsrkn_kcmtn_d_kt_tskmly");
        $datasubur = collect($response->json()['data'] ?? []);
         $latestYear = $datasubur->max('tahun');

    // Filter hanya data tahun terbaru
    $datasubur = $datasubur->where('tahun', $latestYear)->values();

    // Ambil daftar kecamatan unik
    $KecamatanList = $datasubur->pluck('nama_kecamatan')->unique()->values();

    // Dataset hanya untuk tahun terbaru
    $datasets = collect([[
        'label' => $latestYear,
        'data' => $KecamatanList->map(function ($kec) use ($datasubur, $latestYear) {
            return $datasubur
                ->where('nama_kecamatan', $kec)
                ->where('tahun', $latestYear)
                ->sum('jumlah_pasangan_usia_subur');
        }),
    ]]);

    return view('sektoral.PasanganSuburKecamatan', compact(
        'datasubur',
        'datasets',
        'KecamatanList',
        'latestYear'
    ));
    }
    public function KeluargaBerencana()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jumlah_peserta_keluarga_bencana_kb_aktif_di_kota_tasikmalaya");
        $datakb = collect($response->json()['data'] ?? []);

        $groupedByYear = $datakb->groupBy('tahun');
        $tahunList = $groupedByYear->keys();
        $totalKbPerTahun = $groupedByYear->map(function ($items) {
            return $items->sum('jumlah_peserta_keluarga_berencana_aktif');
            })->values();

    return view('sektoral.KeluargaBerencana', compact('datakb','groupedByYear', 'tahunList', 'totalKbPerTahun'));
    }
    public function KbKontrasepsi()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_psrt_klrg_brncn_kb_ktf_brdsrkn_mtd_lt_kntrsps_d_kt_tskmly");
        $datakontrasepsi = collect($response->json()['data'] ?? []);

    // Ambil tahun terbaru
    $latestYear = $datakontrasepsi->max('tahun');

    // Filter hanya tahun terbaru
    $datakontrasepsi = $datakontrasepsi->where('tahun', $latestYear)->values();

    // Group by tahun (hanya 1 tahun: terbaru)
    $groupedByYear = $datakontrasepsi->groupBy('tahun');

    // Group by metode kontrasepsi
    $groupedByMethod = $datakontrasepsi->groupBy('metode_alat_kontrasepsi');

    // Daftar metode kontrasepsi
    $metodeList = $groupedByMethod->keys();

    // Total peserta per metode
    $totalPesertaPerMetode = $groupedByMethod->map(function ($items) {
        return $items->sum(function ($item) {
            return (int) $item['jumlah_peserta_keluarga_berencana_aktif'];
        });
    })->values();

    return view('sektoral.KbKontrasepsi', compact(
        'datakontrasepsi',
        'groupedByMethod',
        'metodeList',
        'groupedByYear',
        'totalPesertaPerMetode',
        'latestYear'
    ));
}

    public function KbKontrasepsiKecamatan()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_pmkn_lt_kntrsps_brdsrkn_kcmtn_d_kt_tskmly");
        $datakontrasepsi = collect($response->json()['data'] ?? []);
        $latestYear = $datakontrasepsi->max('tahun');

    // Filter hanya data tahun terbaru
    $datakontrasepsi = $datakontrasepsi->where('tahun', $latestYear)->values();

    // Ambil daftar kecamatan unik
    $KecamatanList = $datakontrasepsi->pluck('nama_kecamatan')->unique()->values();

    // Dataset hanya untuk tahun terbaru
    $datasets = collect([[
        'label' => $latestYear,
        'data' => $KecamatanList->map(function ($kec) use ($datakontrasepsi, $latestYear) {
            return $datakontrasepsi
                ->where('nama_kecamatan', $kec)
                ->where('tahun', $latestYear)
                ->sum('jumlah_alat_kontrasepsi');
        }),
    ]]);

    return view('sektoral.KbKontrasepsiKecamatan', compact(
        'datakontrasepsi',
        'datasets',
        'KecamatanList',
        'latestYear'
    ));
    }
    public function KbKecamatan()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlhpsrtklrgbncnkbktfbrdsrknkcmtndkttskmly");
        $datakb = collect($response->json()['data'] ?? []);
    // Ambil tahun terbaru
    $latestYear = $datakb->max('tahun');

    // Filter hanya data tahun terbaru
    $datakb = $datakb->where('tahun', $latestYear)->values();

    // Ambil daftar kecamatan unik
    $KecamatanList = $datakb->pluck('nama_kecamatan')->unique()->values();

    // Dataset hanya untuk tahun terbaru
    $datasets = collect([[
        'label' => $latestYear,
        'data' => $KecamatanList->map(function ($kec) use ($datakb, $latestYear) {
            return $datakb
                ->where('nama_kecamatan', $kec)
                ->where('tahun', $latestYear)
                ->sum('jumlah_peserta_keluarga_berencana_aktif');
        }),
    ]]);

    return view('sektoral.KbKecamatan', compact(
        'datakb',
        'datasets',
        'KecamatanList',
        'latestYear'
    ));
    }

    public function PembangunanGender()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/badan_pusat_statistik_kota_tasikmalaya/indeks_pembangunan_gender_di_kota_tasikmalaya");
        $datapembangunan = collect($response->json()['data'] ?? []);

        $groupedByYear = $datapembangunan->groupBy('tahun');

    $tahunList = $groupedByYear->keys();
    $indexpembangunan = $groupedByYear->map(function ($items) {
        return $items->sum('indeks_pembangunan_gender');
    })->values();

    return view('sektoral.PembangunanGender', compact('datapembangunan','groupedByYear', 'tahunList', 'indexpembangunan'));
    }
    public function PemberdayaanGender()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/badan_pusat_statistik_kota_tasikmalaya/indeks_pemberdayaan_gender_di_kota_tasikmalaya");
        $datapemberdayaan = collect($response->json()['data'] ?? []);

        $groupedByYear = $datapemberdayaan->groupBy('tahun');

    $tahunList = $groupedByYear->keys();
    $indexpemberdayaan = $groupedByYear->map(function ($items) {
        return $items->sum('indeks_pemberdayaan_gender');
    })->values();

    return view('sektoral.PemberdayaanGender', compact('datapemberdayaan','groupedByYear', 'tahunList', 'indexpemberdayaan'));
    }
}
