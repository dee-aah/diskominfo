<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.profil.dashboard', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profils = Profil::all();
        return view('admin.profil.create', compact('profils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'img' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('profil', $filename);
        }
   Profil::create([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'img' => $filename,
        'user_id' => Auth::id(),

    ]);

    return redirect()->route('profil.dashboard')->with('success', 'Profil Pimpinan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil)
    {

        $filename = $profil->img;
        if ($request->hasFile('img')) {
            if ($profil->img) {
                Storage::delete('public/profil/' . $profil->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('profil', $filename);
        }
        $profil->update([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'img' => $filename
        ]);
        return redirect()->route('profil.dashboard')->with('success', 'Profil Pimpinan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        if ($profil->img) {
        Storage::delete('public/profil/' . $profil->img);
    }
    $profil->delete();

    return redirect()->route('profil.dashboard')->with('success', 'Profil Pimpinan berhasil dihapus');
    }
    public function show(Profil $profil)
    {
        return view('Admin.profil.show', compact('profil'));
    }
}
