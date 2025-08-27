<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
class AdminLayananController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Layanan::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });}
        $layanans = $query->latest()->get();
        return view('admin.layanan.dashboard', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanans =Layanan::all();
        return view('admin.layanan.create', compact('layanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'des_singkat' => 'required',
        'deskripsi' => 'required',
        'program' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan', $filename);
        }

    Layanan::create([
        'nama' => $request->nama,
        'program' => $request->program,
        'des_singkat' => $request->des_singkat,
        'deskripsi' => $request->deskripsi,
        'gambar' => $filename
    ]);

    return redirect()->route('layanan.dashboard')->with('success', 'Layanan  Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan', $filename);
        } else {
            $filename = $layanan->gambar;
        }
        $layanan->update([
            'nama' => $request->nama,
            'des_singkat' => $request->des_singkat,
            'deskripsi' => $request->deskripsi,
            'program' => $request->program,
            'gambar' => $filename
        ]);
        return redirect()->route('layanan.dashboard')->with('success', 'Layanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        if ($layanan->gambar) {
            Storage::delete('public/layanan/' . $layanan->gambar);
        }
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan Berhasil Dihapus');
    }
}
