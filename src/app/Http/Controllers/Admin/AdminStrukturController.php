<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminStrukturController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Struktur::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $strukturs = $query->latest()->get();
        return view('admin.strukturr.dashboard', compact('strukturs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $strukturs = Struktur::all();
        return view('admin.strukturr.create', compact('strukturs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'deskripsi' => 'required',
        'img' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('struktur', $filename);
        }
    Struktur::create([
        'deskripsi' => $request->deskripsi,
        'user_id' => Auth::id(),
        'img' => $filename

    ]);

    return redirect()->route('struktur.dashboard')->with('success', 'Tentang Kami Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Struktur $strukturr)
    {
        return view('admin.struktur.edit', compact('strukturr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Struktur $strukturr)
    {

        $filename = $strukturr->img;
        if ($request->hasFile('img')) {
            if ($strukturr->img) {
                Storage::delete('public/struktur/' . $strukturr->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('struktur', $filename);
        }
        $strukturr->update([
        'deskripsi' => $request->deskripsi,
        'img' => $filename
        ]);
        return redirect()->route('strukturr.dashboard')->with('success', 'Struktur Organisasi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Struktur $strukturr)
    {
        if ($strukturr->img) {
        Storage::delete('public/strukturr/' . $strukturr->img);
    }
    $strukturr->delete();

    return redirect()->route('struktur.dashboard')->with('success', 'Struktur Organisasi berhasil dihapus');
    }
    public function show(Struktur $strukturr)
    {
        return view('Admin.profil.show', compact('strukturr'));
    }
}
