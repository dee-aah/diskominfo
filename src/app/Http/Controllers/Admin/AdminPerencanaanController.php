<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perencanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminPerencanaanController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Perencanaan::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });}
        $perencanaans = $query->latest()->get();
        return view('admin.perencanaan.dashboard', compact('perencanaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perencanaan = Perencanaan::all();
        return view('admin.perencanaan.create', compact('perencanaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'link' => 'required',
        'img_pdf' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('img_pdf')) {
            $file = $request->file('img_pdf');
            $filename = $file->getClientOriginalName();
            $file->storeAs('perencanaan', $filename);
        }
    Perencanaan::create([
        'nama' => $request->nama,
        'link' => $request->link,
        'img_pdf' => $filename,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('perencanaan.dashboard')->with('success', ' Dokumen Perencanaan Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perencanaan $perencanaan)
    {
        return view('admin.perencanaan.edit', compact('perencanaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perencanaan $perencanaan)
    {
        $filename = $perencanaan->img_pdf;
        if ($request->hasFile('img_pdf')) {
            if ($perencanaan->img_pdf) {
                Storage::delete('public/perencanaan/' . $perencanaan->img_pdf);
            }
            $file = $request->file('img_pdf');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('perencanaan', $filename);
        }
        $perencanaan->update([
            'nama' => $request->nama,
            'link' => $request->link,
            'img_pdf' => $filename
        ]);
        return redirect()->route('perencanaan.dashboard')->with('success', 'Dokumen Perencanaan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perencanaan $perencanaan)
    {
        if ($perencanaan->img_pdf) {
        Storage::delete('public/perencanaan/' . $perencanaan->img_pdf);
    }
    $perencanaan->delete();

    return redirect()->route('perencanaan.dashboard')->with('success', 'Dokumen Perencanaan berhasil dihapus');
    }
    public function show(Perencanaan $perencanaan)
    {
    return view('admin.perencanaan.show', compact('perencanaan'));
    }
}
