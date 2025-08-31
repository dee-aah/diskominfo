<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Tentang;
use Illuminate\Http\Request;
use App\Models\Kategori;
class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriDinas = [
            'Berita DPPKBP3A', 'Pengendalian Penduduk', 'Keluarga Berencana',
            'Pemberdayaan Perempuan', 'Perlindungan Anak'
        ];
        $beritaterbaru = $this->getBeritaByKategori($kategoriDinas, 'created_at', 8);
        $tentang = Tentang::first();
        return view('tentang.index',compact('tentang','kategoriDinas','beritaterbaru'));
    }
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
     * Show the form for creating a new resource.
     */
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
