<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sektoral;
use Illuminate\Support\Facades\Storage;

class AdminSektoralController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Sektoral::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $sektorals = $query->latest()->get();
        return view('admin.sektoral_cont.dashboard', compact('sektorals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sektorals = Sektoral::all();
        return view('admin.sektoral_cont.create', compact('sektorals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('sektorall', $filename);
        }
    Sektoral::create([
        'deskripsi' => $request->deskripsi,
        'gambar' => $filename

    ]);

    return redirect()->route('sektoral_cont.dashboard')->with('success', 'Sektoral Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sektoral = Sektoral::findOrFail($id);
        return view('admin.sektoral_cont.edit', compact('sektoral'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sektoral = Sektoral::findOrFail($id);

        $filename = $sektoral->gambar;
        if ($request->hasFile('gambar')) {
            if ($sektoral->gambar) {
                Storage::delete('public/sektorall/' . $sektoral->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('sektorall', $filename);
        }
        $sektoral->update([
        'deskripsi' => $request->deskripsi,
        'gambar' => $filename
        ]);
        return redirect()->route('sektoral_cont.dashboard')->with('success', 'Sektoral Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sektoral = Sektoral::findOrFail($id);
        $sektoral->delete();
        return redirect()->back()->with('success', 'Konten SektoralBerhasil Dihapus');
    }
}
