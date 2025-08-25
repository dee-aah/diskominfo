<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;

class AdminProfilController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Profil::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('des_singkat', 'like', "%{$search}%");
            });}
        $profils = $query->latest()->get();
        return view('admin.profill.dashboard', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profils = Profil::all();
        return view('admin.profill.create', compact('profils'));
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
        'img_team' => 'nullable|image|mimes:jpg,jpeg,png',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filenames = null;
        if ($request->hasFile('img_team')) {
            $file = $request->file('img_team');
            $filenames = $file->getClientOriginalName();
            $file->storeAs('profil', $filenames);
        }

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('profil', $filename);
        }
   Profil::create([
        'nama' => $request->nama,
        'des_singkat' => $request->des_singkat,
        'deskripsi' => $request->deskripsi,
        'img_team' => $filenames,
        'gambar' => $filename

    ]);

    return redirect()->route('profill.dashboard')->with('success', 'Profil Pimpinan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profil = Profil::findOrFail($id);
        return view('admin.profill.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profil = Profil::findOrFail($id);

        $filenames = $profil->img_team;
        if ($request->hasFile('img_team')) {
            if ($profil->img_team) {
                Storage::delete('public/profil/' . $profil->img_team);
            }
            $file = $request->file('img_team');
            $filenames =  $file->getClientOriginalName();
            $file->storeAs('profil', $filenames);
        }
        $filename = $profil->gambar;
        if ($request->hasFile('gambar')) {
            if ($profil->gambar) {
                Storage::delete('public/profil/' . $profil->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('profil', $filename);
        }
        $profil->update([
        'nama' => $request->nama,
        'des_singkat' => $request->des_singkat,
        'deskripsi' => $request->deskripsi,
        'img_team' => $filenames,
        'gambar' => $filename
        ]);
        return redirect()->route('profill.dashboard')->with('success', 'Profil Pimpinan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();
        return redirect()->back()->with('success', 'Profil Pimpinan Berhasil Dihapus');
    }
}
