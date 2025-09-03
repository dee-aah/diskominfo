<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil_conts;
use Illuminate\Support\Facades\Storage;

class AdminProfilContController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Profil_conts::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('des_singkat', 'like', "%{$search}%");
            });}
        $profils = $query->latest()->get();
        return view('admin.profil_cont.dashboard', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profils = Profil_conts::all();
        return view('admin.profil_cont.create', compact('profils'));
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
            $file->storeAs('profil_cont', $filename);
        }
    Profil_conts::create([

        'deskripsi' => $request->deskripsi,
        'gambar' => $filename

    ]);

    return redirect()->route('profil_cont.dashboard')->with('success', 'Profil Pimpinan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profil = Profil_conts::findOrFail($id);
        return view('admin.profil_cont.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profil = Profil_conts::findOrFail($id);

        $filename = $profil->gambar;
        if ($request->hasFile('gambar')) {
            if ($profil->gambar) {
                Storage::delete('public/profil_cont/' . $profil->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('profil_cont', $filename);
        }
        $profil->update([
        'deskripsi' => $request->deskripsi,
        'gambar' => $filename
        ]);
        return redirect()->route('profil_cont.dashboard')->with('success', 'Profil Pimpinan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profil = Profil_conts::findOrFail($id);
        $profil->delete();
        return redirect()->back()->with('success', 'Profil Pimpinan Berhasil Dihapus');
    }
}
