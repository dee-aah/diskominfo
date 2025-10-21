<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use App\Models\LayananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayananDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function dashboard(Request $request)
    {
        $query = LayananDetail::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            });}
        $layanan_detail = LayananDetail::paginate(6);
        return view('admin.layanan_detail.dashboard', compact('layanan_detail'));
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
        'img' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan_detail', $filename);
        }

    LayananDetail::create([
        'jenis' => $request->jenis,
        'layanan_id' => $request->layanan_id,
        'deskripsi' => $request->deskripsi,
        'img' => $filename,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('layanan_detail.dashboard')->with('success', 'Detail Layanan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LayananDetail $layanan_detail)
    {
        $layanans = Layanan::all();
        $enumValues = DB::select("SHOW COLUMNS FROM layanan_details WHERE Field = 'jenis'");
        preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $jenisOptions = explode("','", $matches[1],);
        return view('admin.layanan_detail.edit', compact('layanan_detail','layanans','jenisOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LayananDetail $layanan_detail)
    {
        $filename = $layanan_detail->img;
        if ($request->hasFile('img')) {
            if ($layanan_detail->img) {
                Storage::delete('public/layanan_detail/' . $layanan_detail->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('layanan_detail', $filename);
        }
        $layanan_detail->update([
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'layanan_id' => $request->layanan_id,
            'img' => $filename
        ]);
        return redirect()->route('layanan_detail.dashboard')->with('success', 'Detail Layanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananDetail $layanan_detail)
    {
        if ($layanan_detail->img) {
        Storage::delete('public/layanan_detail/' . $layanan_detail->img);
    }
    $layanan_detail->delete();

    return redirect()->route('layanan_detail.dashboard')->with('success', 'Detail Layanan  berhasil dihapus');
    }
    public function show(LayananDetail $layanan_detail)
{
    return view('admin.layanan_detail.show', compact('layanan_detail'));
}
}
