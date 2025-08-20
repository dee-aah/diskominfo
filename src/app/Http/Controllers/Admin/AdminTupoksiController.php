<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tupoksi;
use Illuminate\Support\Facades\Storage;

class AdminTupoksiController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Tupoksi::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('des_singkat', 'like', "%{$search}%")
                    ->orWhere('fungsi_utama', 'like', "%{$search}%")
                    ->orWhere('tugas_utama', 'like', "%{$search}%");
            });}
        $tupoksis = $query->latest()->get();
        return view('admin.tupoksii.dashboard', compact('tupoksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tupoksis = Tupoksi::all();
        return view('admin.tupoksii.create', compact('tupoksis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'tugas_utama' => 'required',
        'des_singkat' => 'required',
        'fungsi_utama' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('tupoksi', $filename);
        }

    Tupoksi::create([
        'tugas_utama' => $request->tugas_utama,
        'des_singkat' => $request->des_singkat,
        'fungsi_utama' => $request->fungsi_utama,
        'gambar' => $filename
    ]);

    return redirect()->route('tupoksii.dashboard')->with('success', 'Tupoksi Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        return view('admin.tupoksii.edit', compact('tupoksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tupoksi = Tupoksi::findOrFail($id);

        $filename = $tupoksi->gambar;
        if ($request->hasFile('gambar')) {
            if ($tupoksi->gambar) {
                Storage::delete('public/tupoksi/' . $tupoksi->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('tupoksi', $filename);
        }
        $tupoksi->update([
        'tugas_utama' => $request->tugas_utama,
        'des_singkat' => $request->des_singkat,
        'fungsi_utama' => $request->fungsi_utama,
        'gambar' => $filename
        ]);
        return redirect()->route('tupoksii.dashboard')->with('success', 'Tupoksi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tupoksi = Tupoksi::findOrFail($id);
        if ($tupoksi->gambar) {
            Storage::delete('public/tupoksi/' . $tupoksi->gambar);
        }
        $tupoksi->delete();
        return redirect()->back()->with('success', 'Tupoksi Berhasil Dihapus');
    }
}
