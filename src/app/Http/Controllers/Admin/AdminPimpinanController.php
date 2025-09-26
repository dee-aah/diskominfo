<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SambutanPimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminPimpinanController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = SambutanPimpinan::query();
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
        $pimpinans = SambutanPimpinan::all();
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
        'img' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('pimpinan', $filename);
        }

    SambutanPimpinan::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'img' => $filename,
        'user_id' => Auth::id(),

    ]);

    return redirect()->route('pimpinan.dashboard')->with('success', 'Pimpinan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SambutanPimpinan $pimpinan)
    {
        return view('admin.pimpinan.edit', compact('pimpinan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SambutanPimpinan $pimpinan)
    {

        $filename = $pimpinan->img;
        if ($request->hasFile('img')) {
            if ($pimpinan->img) {
                Storage::delete('public/pimpinan/' . $pimpinan->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('pimpinan', $filename);
        }
        $pimpinan->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'gambar' => $filename
        ]);
        return redirect()->route('pimpinan.dashboard')->with('success', 'Pimpinan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SambutanPimpinan $pimpinan)
    {
        if ($pimpinan->img) {
        Storage::delete('public/pimpinan/' . $pimpinan->img);
    }
    $pimpinan->delete();

    return redirect()->route('pimpinan.dashboard')->with('success', 'Sambutan Pimpinan berhasil dihapus');
    }
    public function show(SambutanPimpinan $pimpinan)
    {
        return view('Admin.pimpinan.show', compact('pimpinan'));
    }
}
