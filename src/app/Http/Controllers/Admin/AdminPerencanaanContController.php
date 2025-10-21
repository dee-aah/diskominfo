<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerencanaanCont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPerencanaanContController extends Controller
{
     public function dashboard(Request $request)
    {

        $query = PerencanaanCont::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });}
        $perencanaans = $query->latest()->get();
        return view('admin.perencanaan_cont.dashboard', compact('perencanaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perencanaan = PerencanaanCont::all();
        return view('admin.perencanaan_cont.create', compact('perencanaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'des_singkat' => 'required',
        'img_konten' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);
        $filename = null;
        if ($request->hasFile('img_konten')) {
            $file = $request->file('img_konten');
            $filename = $file->getClientOriginalName();
            $file->storeAs('perencanaancont', $filename);
        }

    PerencanaanCont::create([
        'des_singkat' => $request->des_singkat,
        'img_konten' => $filename
    ]);

    return redirect()->route('perencanaan_cont.dashboard')->with('success', ' Dokumen Perencanaan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perencanaan = PerencanaanCont::findOrFail($id);
        return view('admin.perencanaan_cont.edit', compact('perencanaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perencanaan = PerencanaanCont::findOrFail($id);

        $filename = $perencanaan->img_konten;
        if ($request->hasFile('img_konten')) {
            if ($perencanaan->img_konten) {
                Storage::delete('public/perencanaancont/' . $perencanaan->img_konten);
            }
            $file = $request->file('img_konten');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('perencanaancont', $filename);
        }
        $perencanaan->update([
        'des_singkat' => $request->des_singkat,
        'img_konten' => $filename
        ]);
        return redirect()->route('perencanaan_cont.dashboard')->with('success', 'Dokumen Perencanaan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perencanaan = PerencanaanCont::findOrFail($id);
        if ($perencanaan->gambar) {
            Storage::delete('public/perencanaancont/' . $perencanaan->img_konten);
        }
        $perencanaan->delete();
        return redirect()->back()->with('success', 'Dokumen Perencanaan Berhasil Dihapus');
    }
}
