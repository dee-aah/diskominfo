<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananBeranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminLayananBerandaController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = LayananBeranda::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });}
        $layanans = $query->latest()->get();
        return view('admin.layanan_beranda.dashboard', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = LayananBeranda::all();
        return view('admin.layanan_beranda.create', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'link' => 'nullable',
        'deskripsi' => 'required'
    ]);
    LayananBeranda::create([
            'nama' => $request->nama,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi
    ]);

    return redirect()->route('layanan_beranda.dashboard')->with('success', ' Layanan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = LayananBeranda::findOrFail($id);
        return view('admin.layanan_beranda.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = LayananBeranda::findOrFail($id);
        $layanan->update([
            'nama' => $request->nama,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('layanan_beranda.dashboard')->with('success', 'Layanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = LayananBeranda::findOrFail($id);
        $layanan->delete();
        return redirect()->back()->with('success', 'Layanan Beranda Berhasil Dihapus');
    }
}
