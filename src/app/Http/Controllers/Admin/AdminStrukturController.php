<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminStrukturController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Struktur::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $strukturs = $query->latest()->get();
        return view('admin.struktur_.dashboard', compact('strukturs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $strukturs = Struktur::all();
        return view('admin.struktur_.create', compact('strukturs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'deskripsi' => 'required',
        'gambar_cont' => 'nullable|image|mimes:jpg,jpeg,png',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('gambar_cont')) {
            $file = $request->file('gambar_cont');
            $filenames = $file->getClientOriginalName();
            $file->storeAs('struktur', $filenames);
        }

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('struktur', $filename);
        }
    Struktur::create([
        'deskripsi' => $request->deskripsi,
        'gambar_cont' => $filenames,
        'gambar' => $filename

    ]);

    return redirect()->route('struktur_.dashboard')->with('success', 'Tentang Kami Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $struktur = Struktur::findOrFail($id);
        return view('admin.struktur_.edit', compact('struktur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $struktur = Struktur::findOrFail($id);

        $filename = $struktur->gambar_cont;
        if ($request->hasFile('gambar_cont')) {
            if ($struktur->gambar_cont) {
                Storage::delete('public/struktur/' . $struktur->gambar_cont);
            }
            $file = $request->file('gambar_cont');
            $filenames =  $file->getClientOriginalName();
            $file->storeAs('struktur', $filenames);
        }
        $filename = $struktur->gambar;
        if ($request->hasFile('gambar')) {
            if ($struktur->gambar) {
                Storage::delete('public/struktur/' . $struktur->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('struktur', $filename);
        }
        $struktur->update([
        'deskripsi' => $request->deskripsi,
        'gambar_cont' => $filenames,
        'gambar' => $filename
        ]);
        return redirect()->route('struktur_.dashboard')->with('success', 'Struktur Organisasi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $struktur = Struktur::findOrFail($id);
        $struktur->delete();
        return redirect()->back()->with('success', 'Struktur Organisasi Berhasil Dihapus');
    }
}
