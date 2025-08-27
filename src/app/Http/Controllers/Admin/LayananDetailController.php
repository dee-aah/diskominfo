<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use App\Models\Layanan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LayananDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function dashboard(Request $request)
    {
        $query = Layanan_detail::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            });}
        $layanan_details = Layanan_detail::all();
        return view('admin.layanan_detail.dashboard', compact('layanan_details'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanans = Layanan::all();
        $enumValues = DB::select("SHOW COLUMNS FROM layanan_details WHERE Field = 'jenis'");
        preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $jenisOptions = explode("','", $matches[1]);
        return view('admin.layanan_detail.create', compact('layanans','jenisOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'jenis' => 'required',
        'deskripsi' => 'required',
        'layanan_id' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan_detail', $filename);
        }

    Layanan_detail::create([
        'jenis' => $request->jenis,
        'layanan_id' => $request->layanan_id,
        'deskripsi' => $request->deskripsi,
        'gambar' => $filename
    ]);

    return redirect()->route('admin.layanan_detail.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $layanan = Layanan::where('slug', $slug)->firstOrFail();

        return view('layanan_details.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanans = Layanan::all();
        $enumValues = DB::select("SHOW COLUMNS FROM layanan_details WHERE Field = 'jenis'");
        preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $jenisOptions = explode("','", $matches[1]);
        $layanan_detail = Layanan_detail::findOrFail($id);
        return view('admin.layanan_detail.edit', compact('layanan_detail','layanans','jenisOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan_detail = Layanan_detail::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($layanan_detail->gambar) {
                Storage::delete('public/layanan/' . $layanan_detail->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('layanan_detail', $filename);
        }
        $layanan_detail->update([
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'layanan_id' => $request->layanan_id,
            'gambar' => $filename
        ]);
        return redirect()->route('admin.layanan_detail.dashboard')->with('success', 'Layanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan_detail = Layanan_detail::findOrFail($id);
        if ($layanan_detail->gambar) {
            Storage::delete('public/layanan_detail/' . $layanan_detail->gambar);
        }
        $layanan_detail->delete();

        return redirect()->back()->with('success', 'Layanan Berhasil Dihapus');
    }
}
