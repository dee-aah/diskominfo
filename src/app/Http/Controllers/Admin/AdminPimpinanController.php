<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPimpinanController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Pimpinan::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });}
        $pimpinans = $query->latest()->get();
        return view('admin.pimpinan.dashboard', compact('pimpinans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pimpinans = Pimpinan::all();
        return view('admin.pimpinan.create', compact('pimpinans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'vidio' => 'nullable|mimes:mp4,avi,mov,wmv|max:20480',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('pimpinan', $filename);
        }

        $videoname = null;
        if ($request->hasFile('vidio')) {
        $file = $request->file('vidio');
        $videoname = $file->getClientOriginalName();
        $file->storeAs('pimpinan', $videoname, 'public');
        }
    Pimpinan::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'vidio' => $videoname,
        'gambar' => $filename

    ]);

    return redirect()->route('pimpinan.dashboard')->with('success', 'Pimpinan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pimpinan = Pimpinan::findOrFail($id);
        return view('admin.pimpinan.edit', compact('pimpinan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pimpinan = Pimpinan::findOrFail($id);

        $filename = $pimpinan->gambar;
        if ($request->hasFile('gambar')) {
            if ($pimpinan->gambar) {
                Storage::delete('public/pimpinan/' . $pimpinan->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('pimpinan', $filename);
        }
        $videoname = $pimpinan->vidio;
        if ($request->hasFile('vidio')) {
            if ($pimpinan->vidio) {
                Storage::delete('public/pimpinan/' . $pimpinan->vidio);
            }
            $file = $request->file('vidio');
            $videoname =  $file->getClientOriginalName();
            $file->storeAs('pimpinan', $videoname);
        }
        $pimpinan->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'vidio' => $videoname,
        'gambar' => $filename
        ]);
        return redirect()->route('pimpinan.dashboard')->with('success', 'Pimpinan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pimpinan = Pimpinan::findOrFail($id);
        $pimpinan->delete();
        return redirect()->back()->with('success', 'Pimpinan Berhasil Dihapus');
    }
}
