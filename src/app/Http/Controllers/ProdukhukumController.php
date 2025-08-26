<?php

namespace App\Http\Controllers;

use App\Models\ProdukHukum;
use App\Models\ProdukHukumCont;
use Illuminate\Http\Request;

class ProdukhukumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produkhukum = ProdukHukum::all();
        $ProdukHukumCont = ProdukHukumCont::first();
        return view ('produkhukum.index',compact('ProdukHukumCont','produkhukum'));
    }
    public function download($id)
{
    $produk = ProdukHukum::findOrFail($id);
    $filePath = storage_path('app/public/produk/'.$produk->lampiran);

    return response()->download($filePath, $produk->judul.'.pdf');
}
    public function preview($id)
{
    $produk = ProdukHukum::findOrFail($id);
    $pdfUrl = asset('storage/produk/' . $produk->lampiran);

    return view('produkhukum.preview', compact('pdfUrl','produk'));
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
    public function show( $id)
    {
        $produk = ProdukHukum::findOrFail($id);
        $pdfUrl = $produk->lampiran
            ? asset('storage/'.$produk->lampiran)
            : null;
    $ProdukHukumCont = ProdukHukumCont::first();
    return view('produkhukum.show', compact('produk','ProdukHukumCont','pdfUrl'));

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
