<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdukHukum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminProdukHukumController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = ProdukHukum::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('jenis_peraturan', 'like', "%{$search}%")
                    ->orWhere('judul_peraturan', 'like', "%{$search}%")
                    ->orWhere('singkatan_jenis', 'like', "%{$search}%");
            });}
        $produk_hukum = $query->latest()->get();
        return view('admin.produk_hukum.dashboard', compact('produk_hukum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk_hukum = ProdukHukum::all();
        $enumValues = DB::select("SHOW COLUMNS FROM produk_hukums WHERE Field = 'jenis_peraturan'");
        preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $jenisOptions = explode("','", $matches[1]);
        return view('admin.produk_hukum.create', compact('produk_hukum','jenisOptions'));
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
            'naskah_akademik'      => $paths,
            'user_id' => Auth::id(),
    ]);
    return redirect()->route('produk_hukum.dashboard')->with('success', 'Produk Hukum  Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukHukum $produk_hukum)
    {   
        $enumValues = DB::select("SHOW COLUMNS FROM produk_hukums WHERE Field = 'jenis_peraturan'");
        preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $jenisOptions = explode("','", $matches[1]);
        return view('admin.produk_hukum.edit', compact('produk_hukum','jenisOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdukHukum $produk_hukum)
    {

        $filenames = $produk_hukum->lampiran;
        if ($request->hasFile('lampiran')) {
            if ($produk_hukum->lampiran) {
                Storage::delete('public/produk/' . $produk_hukum->lampiran);
            }
            $file = $request->file('lampiran');
            $filenames =  $file->getClientOriginalName();
            $file->storeAs('produk', $filenames);
        }
        $filename = $produk_hukum->naskah_akademik;
        if ($request->hasFile('naskah_akademik')) {
            if ($produk_hukum->naskah_akademik) {
                Storage::delete('public/produk/' . $produk_hukum->naskah_akademik);
            }
            $file = $request->file('naskah_akademik');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('produk', $filename);
        }
        $produk_hukum->update([
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
    public function destroy(ProdukHukum $produk_hukum)
    {
        if ($produk_hukum->lampiran) {
            Storage::delete('public/produk/' . $produk_hukum->lampiran);
        }
        $produk_hukum->delete();

        return redirect()->route('produk_hukum.dashboard')->with('success', 'Produk Hukum Berhasil Dihapus');
    }
    public function show(ProdukHukum $produk_hukum)
    {
        return view('Admin.produk_hukum.show', compact('produk_hukum'));
    }
}
