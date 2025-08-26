<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukHukumCont;
use Illuminate\Support\Facades\Storage;

class AdminPHContController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = ProdukHukumCont::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('deskripsi', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $produks = $query->latest()->get();
        return view('admin.produk_hukum_cont.dashboard', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = ProdukHukumCont::all();
        return view('admin.produk_hukum_cont.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'deskripsi' => 'required',
        'img_cont' => 'nullable|image|mimes:jpg,jpeg,png',
        'img_pdf' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filenames = null;
        if ($request->hasFile('img_cont')) {
            $file = $request->file('img_cont');
            $filenames = $file->getClientOriginalName();
            $file->storeAs('produkimg', $filenames);
        }

        $filename = null;
        if ($request->hasFile('img_pdf')) {
            $file = $request->file('img_pdf');
            $filename = $file->getClientOriginalName();
            $file->storeAs('produkimg', $filename);
        }
    ProdukHukumCont::create([
        'deskripsi' => $request->deskripsi,
        'img_cont' => $filenames,
        'img_pdf' => $filename

    ]);

    return redirect()->route('produk_hukum_cont.dashboard')->with('success', 'Tentang Kami Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = ProdukHukumCont::findOrFail($id);
        return view('admin.produk_hukum_cont.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = ProdukHukumCont::findOrFail($id);

        $filenames = $produk->img_cont;
        if ($request->hasFile('img_cont')) {
            if ($produk->img_cont) {
                Storage::delete('public/produkimg/' . $produk->img_cont);
            }
            $file = $request->file('img_cont');
            $filenames =  $file->getClientOriginalName();
            $file->storeAs('produkimg', $filenames);
        }
        $filename = $produk->img_pdf;
        if ($request->hasFile('img_pdf')) {
            if ($produk->img_pdf) {
                Storage::delete('public/produkimg/' . $produk->img_pdf);
            }
            $file = $request->file('img_pdf');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('produkimg', $filename);
        }
        $produk->update([
        'deskripsi' => $request->deskripsi,
        'img_cont' => $filenames,
        'img_pdf' => $filename
        ]);
        return redirect()->route('produk_hukum_cont.dashboard')->with('success', 'Konten Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = ProdukHukumCont::findOrFail($id);
        $produk->delete();
        return redirect()->back()->with('success', 'Struktur Organisasi Berhasil Dihapus');
    }
}
