<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukHukum;
use Illuminate\Support\Facades\Storage;

class AdminProdukHukumController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = ProdukHukum::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });}
        $produks = $query->latest()->get();
        return view('admin.produk_hukum.dashboard', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = ProdukHukum::all();
        return view('admin.produk_hukum.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'reg'                 => 'required|string',
        'jenis_peraturan'     => 'required|string|max:255',
        'judul_peraturan'     => 'required|string',
        'nomor'               => 'required',
        'tahun_terbit'        => 'required|digits:4',
        'singkatan_jenis'     => 'nullable|string|max:50',
        'tahun_penetapan'     => 'nullable|date',
        'tanggal_pengundangan'=> 'nullable|date',
        'pengarang'           => 'nullable|string|max:255',
        'sumber'              => 'nullable|string|max:255',
        'tempat_terbit'       => 'nullable|string|max:255',
        'bidang_hukum'        => 'nullable|string|max:255',
        'subjek'              => 'nullable|string|max:255',
        'bahasa'              => 'nullable|string|max:100',
        'lokasi'              => 'nullable|string|max:255',
        'status'              => 'required|in:BERLAKU,TIDAK BERLAKU',
        'lampiran'            => 'nullable|file|mimes:pdf',
        'naskah_akademik'     => 'nullable|file|mimes:pdf',
    ]);
        // $filenames = null;
        // if ($request->hasFile('lampiran')) {
        //     $file = $request->file('lampiran');
        //     $filenames = $file->getClientOriginalName();
        //     $file->storeAs('produk', $filenames);
        // }
        // $filename = null;
        // if ($request->hasFile('naskah_akademik')) {
        //     $file = $request->file('naskah_akademik');
        //     $filename = $file->getClientOriginalName();
        //     $file->storeAs('produk', $filename);
        // }

$path = null;
if ($request->hasFile('lampiran')) {
    $fileLampiran = $request->file('lampiran');
    $filenameLampiran =  $fileLampiran->getClientOriginalName();
    $path = $fileLampiran->storeAs('produk', $filenameLampiran, 'public');
}

// Naskah Akademik
$paths = null;
if ($request->hasFile('naskah_akademik')) {
    $fileNaskah = $request->file('naskah_akademik');
    $filenameNaskah = $fileNaskah->getClientOriginalName();
    $paths = $fileNaskah->storeAs('produk', $filenameNaskah, 'public');
}

        ProdukHukum::create([
            'reg'                  => $request->reg,
            'jenis_peraturan'      => $request->jenis_peraturan,
            'judul_peraturan'      => $request->judul_peraturan,
            'nomor'                => $request->nomor,
            'tahun_terbit'         => $request->tahun_terbit,
            'singkatan_jenis'      => $request->singkatan_jenis,
            'tahun_penetapan'      => $request->tahun_penetapan,
            'tanggal_pengundangan' => $request->tanggal_pengundangan,
            'pengarang'            => $request->pengarang,
            'sumber'               => $request->sumber,
            'tempat_terbit'        => $request->tempat_terbit,
            'bidang_hukum'         => $request->bidang_hukum,
            'subjek'               => $request->subjek,
            'bahasa'               => $request->bahasa,
            'lokasi'               => $request->lokasi,
            'status'               => $request->status,
            'lampiran'             => $path,
            'naskah_akademik'      => $paths
    ]);
    return redirect()->route('produk_hukum.dashboard')->with('success', 'Produk Hukum  Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = ProdukHukum::findOrFail($id);
        return view('admin.produk_hukum.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = ProdukHukum::findOrFail($id);

        $filenames = $produk->lampiran;
        if ($request->hasFile('lampiran')) {
            if ($produk->lampiran) {
                Storage::delete('public/produk/' . $produk->lampiran);
            }
            $file = $request->file('lampiran');
            $filenames =  $file->getClientOriginalName();
            $file->storeAs('produk', $filenames);
        }
        $filename = $produk->naskah_akademik;
        if ($request->hasFile('naskah_akademik')) {
            if ($produk->naskah_akademik) {
                Storage::delete('public/produk/' . $produk->naskah_akademik);
            }
            $file = $request->file('naskah_akademik');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('produk', $filename);
        }
        $produk->update([
            'reg'                  => $request->reg,
            'jenis_peraturan'      => $request->jenis_peraturan,
            'judul_peraturan'      => $request->judul_peraturan,
            'nomor'                => $request->nomor,
            'tahun_terbit'         => $request->tahun_terbit,
            'singkatan_jenis'      => $request->singkatan_jenis,
            'tahun_penetapan'      => $request->tahun_penetapan,
            'tanggal_pengundangan' => $request->tanggal_pengundangan,
            'pengarang'            => $request->pengarang,
            'sumber'               => $request->sumber,
            'tempat_terbit'        => $request->tempat_terbit,
            'bidang_hukum'         => $request->bidang_hukum,
            'subjek'               => $request->subjek,
            'bahasa'               => $request->bahasa,
            'lokasi'               => $request->lokasi,
            'status'               => $request->status,
            'lampiran'             => $filenames,
            'naskah_akademik'      => $filename
        ]);
        return redirect()->route('produk_hukum.dashboard')->with('success', 'Produk Hukum Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = ProdukHukum::findOrFail($id);
        if ($produk->lampiran) {
            Storage::delete('public/produk/' . $produk->lampiran);
        }
        $produk->delete();

        return redirect()->back()->with('success', 'Produk Hukum Berhasil Dihapus');
    }
}
