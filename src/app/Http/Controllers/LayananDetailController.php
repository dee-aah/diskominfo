<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Layanan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('layanan_detail.dashboard', compact('layanan_details'));
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
        return view('layanan_detail.create', compact('layanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'urutan' => 'required',
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
        'judul' => $request->judul,
        'layanan_id' => $request->layanan_id,
        'isi' => $request->isi,
        'urutan' => $request->urutan,
        'gambar' => $filename
    ]);

    return redirect()->route('layanan_detail.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
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
        $layanans = Layanan::all();
        $layanan_detail = Layanan_detail::findOrFail($id);
        return view('layanan_detail.edit', compact('layanan_detail','layanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan_detail = Layanan_detail::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan_detail', $filename);
        } else {
            $filename = $layanan_detail->gambar;
        }
        $layanan_detail->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'urutan' => $request->urutan,
            'layanan_id' => $request->layanan_id,
            'gambar' => $filename
        ]);
        return redirect()->route('layanan_detail.dashboard')->with('success', 'Layanan Berhasil Diperbarui');
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
