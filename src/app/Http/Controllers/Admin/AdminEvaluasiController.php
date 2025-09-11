<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEvaluasiController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Evaluasi::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });}
        $evaluasis = $query->latest()->get();
        return view('admin.evaluasi.dashboard', compact('evaluasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evaluasi = Evaluasi::all();
        return view('admin.evaluasi.create', compact('evaluasi'));
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
            $file->storeAs('evaluasi', $filename);
        }
    Evaluasi::create([
        'nama' => $request->nama,
        'link' => $request->link,
        'img_pdf' => $filename
    ]);

    return redirect()->route('evaluasi.dashboard')->with('success', ' Dokumen Evaluasi Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        return view('admin.evaluasi.edit', compact('evaluasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        $filename = $evaluasi->img_pdf;
        if ($request->hasFile('img_pdf')) {
            if ($evaluasi->img_pdf) {
                Storage::delete('public/evaluasi/' . $evaluasi->img_pdf);
            }
            $file = $request->file('img_pdf');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('evaluasi', $filename);
        }
        $evaluasi->update([
            'nama' => $request->nama,
            'link' => $request->link,
            'img_pdf' => $filename
        ]);
        return redirect()->route('evaluasi.dashboard')->with('success', 'Dokumen Evaluasi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        if ($evaluasi->gambar) {
            Storage::delete('public/evaluasi/' . $evaluasi->img_pdf);
        }
        $evaluasi->delete();
        return redirect()->back()->with('success', 'Dokumen Evaluasi Berhasil Dihapus');
    }
}
