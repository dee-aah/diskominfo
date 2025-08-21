<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maklumat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminMaklumatController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Maklumat::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $maklumats = $query->latest()->get();
        return view('admin.maklumat.dashboard', compact('maklumats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maklumats = Maklumat::all();
        return view('admin.maklumat.create', compact('maklumats'));
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
        $filenames = null;
        if ($request->hasFile('gambar_cont')) {
            $file = $request->file('gambar_cont');
            $filenames = $file->getClientOriginalName();
            $file->storeAs('maklumat1', $filenames);
        }

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('maklumat1', $filename);
        }
    Maklumat::create([
        'deskripsi' => $request->deskripsi,
        'gambar_cont' => $filenames,
        'gambar' => $filename

    ]);

    return redirect()->route('maklumat.dashboard')->with('success', 'Maklumat Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $maklumat = Maklumat::findOrFail($id);
        return view('admin.maklumat.edit', compact('maklumat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $maklumat = Maklumat::findOrFail($id);

        $filenames = $maklumat->gambar_cont;
        if ($request->hasFile('gambar_cont')) {
            if ($maklumat->gambar_cont) {
                Storage::delete('public/maklumat1/' . $maklumat->gambar_cont);
            }
            $file = $request->file('gambar_cont');
            $filenames =  $file->getClientOriginalName();
            $file->storeAs('maklumat1', $filenames);
        }
        $filename = $maklumat->gambar;
        if ($request->hasFile('gambar')) {
            if ($maklumat->gambar) {
                Storage::delete('public/maklumat/' . $maklumat->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('maklumat1', $filename);
        }
        $maklumat->update([
        'deskripsi' => $request->deskripsi,
        'gambar_cont' => $filenames,
        'gambar' => $filename
        ]);
        return redirect()->route('maklumat.dashboard')->with('success', 'Maklumat Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maklumat = Maklumat::findOrFail($id);
        $maklumat->delete();
        return redirect()->back()->with('success', 'Maklumat Berhasil Dihapus');
    }
}
