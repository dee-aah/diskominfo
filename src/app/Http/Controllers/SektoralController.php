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
    $sektoral      = Sektoral::first();
    $sektoral_card = Sektoral_cont::all();

    // ==================== Indeks Gender ====================
    $pemberdayaan = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/badan_pusat_statistik_kota_tasikmalaya/indeks_pemberdayaan_gender_di_kota_tasikmalaya")->json();
    $datapemberdayaan = collect($pemberdayaan['data'] ?? []);
    $groupedPemberdayaan = $datapemberdayaan->groupBy('tahun');
    $tahunPemberdayaanList = $groupedPemberdayaan->keys();
    $indexpemberdayaan = $groupedPemberdayaan->map(fn($items) => $items->sum('indeks_pemberdayaan_gender'))->values();
    $recordpemberdayaanterbaru = $datapemberdayaan->last();
    $tahunpemberdayaanterbaru  = $recordpemberdayaanterbaru['tahun'] ?? null;
    $datapemberdayaanterbaru   = $recordpemberdayaanterbaru['indeks_pemberdayaan_gender'] ?? 0;

    $pembangunan = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/badan_pusat_statistik_kota_tasikmalaya/indeks_pembangunan_gender_di_kota_tasikmalaya")->json();
    $datapembangunan = collect($pembangunan['data'] ?? []);
    $groupedPembangunan = $datapembangunan->groupBy('tahun');
    $tahunPembangunanList = $groupedPembangunan->keys();
    $indexpembangunan = $groupedPembangunan->map(fn($items) => $items->sum('indeks_pembangunan_gender'))->values();

    // ==================== Pasangan Usia Subur ====================
    $subur = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jumlah_pasangan_usia_subur_di_kota_tasikmalaya")->json();
    $datasubur = collect($subur['data'] ?? []);
    $recordsuburterbaru = $datasubur->last();
    $tahunsuburterbaru  = $recordsuburterbaru['tahun'] ?? null;
    $datasuburterbaru   = $recordsuburterbaru['jumlah_pasangan_usia_subur'] ?? 0;

    $groupedSubur = $datasubur->groupBy('tahun');
    $tahunSuburList = $groupedSubur->keys();
    $totalSuburPerTahun = $groupedSubur->map(fn($items) => $items->sum('jumlah_pasangan_usia_subur'))->values();

    // Subur per Kecamatan
    $suburKec = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_psngn_s_sbr_brdsrkn_kcmtn_d_kt_tskmly")->json();
    $datasuburkec = collect($suburKec['data'] ?? []);
    $latestSuburYear = $datasuburkec->max('tahun');
    $datasuburkec = $datasuburkec->where('tahun', $latestSuburYear)->values();
    $kecamatanSuburList = $datasuburkec->pluck('nama_kecamatan')->unique()->values();
    $datasetSubur = collect([[
        'label' => $latestSuburYear,
        'data'  => $kecamatanSuburList->map(fn($kec) => $datasuburkec->where('nama_kecamatan', $kec)->sum('jumlah_pasangan_usia_subur')),
    ]]);

    // ==================== KB Aktif ====================
    $kb = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jumlah_peserta_keluarga_bencana_kb_aktif_di_kota_tasikmalaya")->json();
    $datakb = collect($kb['data'] ?? []);
    $recordkbterbaru = $datakb->last();
    $tahunkbterbaru  = $recordkbterbaru['tahun'] ?? null;
    $datakbterbaru   = $recordkbterbaru['jumlah_peserta_keluarga_berencana_aktif'] ?? 0;

    $groupedKb = $datakb->groupBy('tahun');
    $tahunKbList = $groupedKb->keys();
    $totalKbPerTahun = $groupedKb->map(fn($items) => $items->sum('jumlah_peserta_keluarga_berencana_aktif'))->values();

    // KB per Kecamatan
    $kbKec = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlhpsrtklrgbncnkbktfbrdsrknkcmtndkttskmly")->json();
    $datakbKec = collect($kbKec['data'] ?? []);
    $latestKbYear = $datakbKec->max('tahun');
    $datakbKec = $datakbKec->where('tahun', $latestKbYear)->values();
    $kecamatanKbList = $datakbKec->pluck('nama_kecamatan')->unique()->values();
    $datasetKb = collect([[
        'label' => $latestKbYear,
        'data'  => $kecamatanKbList->map(fn($kec) => $datakbKec->where('nama_kecamatan', $kec)->sum('jumlah_peserta_keluarga_berencana_aktif')),
    ]]);

    // ==================== Kontrasepsi ====================
    $kontrasepsi = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_pmkn_lt_kntrsps_brdsrkn_kcmtn_d_kt_tskmly")->json();
    $datakontrasepsi = collect($kontrasepsi['data'] ?? []);
    $latestKontrasepsiYear = $datakontrasepsi->max('tahun');
    $datakontrasepsi = $datakontrasepsi->where('tahun', $latestKontrasepsiYear)->values();
    $kecamatanKontrasepsiList = $datakontrasepsi->pluck('nama_kecamatan')->unique()->values();
    $datasetKontrasepsi = collect([[
        'label' => $latestKontrasepsiYear,
        'data'  => $kecamatanKontrasepsiList->map(fn($kec) => $datakontrasepsi->where('nama_kecamatan', $kec)->sum('jumlah_alat_kontrasepsi')),
    ]]);

    // Kontrasepsi per Metode
    $kontrasepsiMetode = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_psrt_klrg_brncn_kb_ktf_brdsrkn_mtd_lt_kntrsps_d_kt_tskmly")->json();
    $datakontrasepsiMetode = collect($kontrasepsiMetode['data'] ?? []);
    $latestKontrasepsiMetodeYear = $datakontrasepsiMetode->max('tahun');
    $datakontrasepsiMetode = $datakontrasepsiMetode->where('tahun', $latestKontrasepsiMetodeYear)->values();
    $groupedByMethod = $datakontrasepsiMetode->groupBy('metode_alat_kontrasepsi');
    $metodeList = $groupedByMethod->keys();
    $totalPesertaPerMetode = $groupedByMethod->map(fn($items) => $items->sum(fn($item) => (int) $item['jumlah_peserta_keluarga_berencana_aktif']))->values();

    // ==================== Kekerasan ====================
    $kasus = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_kss_kkrsn_trhdp_prmpn_nk_d_kt_tskmly")->json();
    $datakasus = collect($kasus['data'] ?? []);
    $recordkasusterbaru = $datakasus->last();
    $tahunkasusterbaru  = $recordkasusterbaru['tahun'] ?? null;
    $datakasusterbaru   = $recordkasusterbaru['jumlah_kasus'] ?? 0;

    $groupedKasus = $datakasus->groupBy('tahun');
    $tahunKasusList = $groupedKasus->keys();
    $totalKasusPerTahun = $groupedKasus->map(fn($items) => $items->sum('jumlah_kasus'))->values();

    // Kekerasan per Jenis
    $kasusJenis = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlh_kss_kkrsn_trhdp_prmpn_nk_brdsrkn_jns_kkrsn_d_kt_tskmly")->json();
    $datakasusJenis = collect($kasusJenis['data'] ?? []);
    $latestKasusYear = $datakasusJenis->max('tahun');
    $datakasusJenis = $datakasusJenis->where('tahun', $latestKasusYear)->values();
    $jenisKekerasanList = $datakasusJenis->pluck('jenis_kekerasan')->unique()->values();
    $datasetKasusJenis = collect([[
        'label' => $latestKasusYear,
        'data'  => $jenisKekerasanList->map(fn($jenis) => $datakasusJenis->where('jenis_kekerasan', $jenis)->sum('jumlah_kasus')),
    ]]);

    // ==================== Return ke View ====================
    return view('sektoral.index', compact(
        'sektoral','sektoral_card',

        'datapemberdayaan','recordpemberdayaanterbaru','tahunpemberdayaanterbaru','datapemberdayaanterbaru',
        'tahunPemberdayaanList','indexpemberdayaan','datapembangunan','tahunPembangunanList','indexpembangunan',

        'datasubur','recordsuburterbaru','tahunsuburterbaru','datasuburterbaru',
        'tahunSuburList','totalSuburPerTahun','datasuburkec','datasetSubur','kecamatanSuburList','latestSuburYear',

        'datakb','recordkbterbaru','tahunkbterbaru','datakbterbaru',
        'tahunKbList','totalKbPerTahun','datakbKec','datasetKb','kecamatanKbList','latestKbYear',

        'datakontrasepsi','datakontrasepsiMetode','datasetKontrasepsi','kecamatanKontrasepsiList','latestKontrasepsiYear',
        'metodeList','totalPesertaPerMetode',

        'datakasus','datakasusJenis','recordkasusterbaru','tahunkasusterbaru','datakasusterbaru',
        'tahunKasusList','totalKasusPerTahun','datasetKasusJenis','jenisKekerasanList','latestKasusYear'
    ));
}

}
