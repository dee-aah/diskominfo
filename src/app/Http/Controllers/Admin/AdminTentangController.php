<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminTentangController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Tentang::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $tentangs = $query->latest()->get();
        return view('admin.tentang_kami.dashboard', compact('tentangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tentangs = Tentang::all();
        return view('admin.tentang_kami.create', compact('tentangs'));
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
            $file->storeAs('tentang', $filenames);
        }

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('tentang', $filename);
        }
    Tentang::create([
        'deskripsi' => $request->deskripsi,
        'gambar_cont' => $filenames,
        'gambar' => $filename

    ]);

    return redirect()->route('tentang_kami.dashboard')->with('success', 'Tentang Kami Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tentang = Tentang::findOrFail($id);
        return view('admin.tentang_kami.edit', compact('tentang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tentang = Tentang::findOrFail($id);

        $filename = $tentang->gambar_cont;
        if ($request->hasFile('gambar_cont')) {
            if ($tentang->gambar_cont) {
                Storage::delete('public/tentang/' . $tentang->gambar_cont);
            }
            $file = $request->file('gambar_cont');
            $filenames =  $file->getClientOriginalName();
            $file->storeAs('tentang', $filenames);
        }
        $filename = $tentang->gambar;
        if ($request->hasFile('gambar')) {
            if ($tentang->gambar) {
                Storage::delete('public/tentang/' . $tentang->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('tentang', $filename);
        }
        $tentang->update([
        'deskripsi' => $request->deskripsi,
        'gambar_cont' => $filenames,
        'gambar' => $filename
        ]);
        return redirect()->route('tentang_kami.dashboard')->with('success', 'Tentang Kami Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tentang = Tentang::findOrFail($id);
        $tentang->delete();
        return redirect()->back()->with('success', 'Tentang Kami Berhasil Dihapus');
    }
}
