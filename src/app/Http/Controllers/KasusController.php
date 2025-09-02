<?php

namespace App\Http\Controllers;

use App\Models\Sektoral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class KasusController extends Controller
{
    public function index()
    {
        $sektoral = Sektoral::first();
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

        return view('sektoral.index',compact(
            'sektoral',
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
            'recordkasusterbaru'
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

        $groupedByYear = $datakontrasepsi->groupBy('tahun');
        $groupedByMethod = $datakontrasepsi->groupBy('metode_alat_kontrasepsi');

        $metodeList = $groupedByMethod->keys();
        $totalPesertaPerMetode = $groupedByMethod->map(function ($items) {
            return $items->sum(function ($item) {
            return (int) $item['jumlah_peserta_keluarga_berencana_aktif'];
        });
    })->values();

    return view('sektoral.KbKontrasepsi', compact('datakontrasepsi','groupedByMethod','metodeList','groupedByYear', 'totalPesertaPerMetode'));
    }

    public function KbKontrasepsiKecamatan()
    {
        $response = Http::get("https://opendata.tasikmalayakota.go.id/api/bigdata/dppkbpppa/jmlhpsrtklrgbncnkbktfbrdsrknkcmtndkttskmly");
        $datakontrasepsi = collect($response->json()['data'] ?? []);
        $perPage = 10; // jumlah per halaman
        $page = request()->get('page', 1);
        $items = $datakontrasepsi->slice(($page - 1) * $perPage, $perPage)->values();
        $datakontrasepsi = new LengthAwarePaginator(
            $items,
            $datakontrasepsi->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $years = $datakontrasepsi->pluck('tahun')->unique()->sort()->values();

        $KecamatanList = $datakontrasepsi->pluck('nama_kecamatan')->unique()->values();

        $datasets = $years->map(function ($year) use ($datakontrasepsi, $KecamatanList) {
        return [
            'label' => $year,
            'data' => $KecamatanList->map(function ($kec) use ($datakontrasepsi, $year) {
            return $datakontrasepsi
                ->where('nama_kecamatan', $kec)
                ->where('tahun', $year)
                ->sum('jumlah_peserta_keluarga_berencana_aktif');
            }),
        ];
        });
    return view('sektoral.KbKontrasepsiKecamatan', compact('items',
            'perPage','page','datakontrasepsi','datasets','KecamatanList','years'));
    }
}
