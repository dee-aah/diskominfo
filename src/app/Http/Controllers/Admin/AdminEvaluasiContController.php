<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EvaluasiCont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminEvaluasiContController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = EvaluasiCont::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });}
        $evaluasis = $query->latest()->get();
        return view('admin.evaluasi_cont.dashboard', compact('evaluasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evaluasi = EvaluasiCont::all();
        return view('admin.evaluasi_cont.create', compact('evaluasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'des_singkat' => 'required',
        'img_konten' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('img_konten')) {
            $file = $request->file('img_konten');
            $filename = $file->getClientOriginalName();
            $file->storeAs('evaluasicont', $filename);
        }

    EvaluasiCont::create([
        'des_singkat' => $request->des_singkat,
        'img_konten' => $filename
    ]);

    return redirect()->route('evaluasi_cont.dashboard')->with('success', ' Dokumen Evaluasi Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evaluasi = EvaluasiCont::findOrFail($id);
        return view('admin.evaluasi_cont.edit', compact('evaluasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evaluasi = EvaluasiCont::findOrFail($id);

        $filename = $evaluasi->img_konten;
        if ($request->hasFile('img_konten')) {
            if ($evaluasi->img_konten) {
                Storage::delete('public/evaluasicont/' . $evaluasi->img_konten);
            }
            $file = $request->file('img_konten');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('evaluasicont', $filename);
        }
        $evaluasi->update([
        'des_singkat' => $request->des_singkat,
        'img_konten' => $filename
        ]);
        return redirect()->route('evaluasi_cont.dashboard')->with('success', 'Dokumen Evaluasi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evaluasi = EvaluasiCont::findOrFail($id);
        if ($evaluasi->gambar) {
            Storage::delete('public/evaluasicont/' . $evaluasi->img_konten);
        }
        $evaluasi->delete();
        return redirect()->back()->with('success', 'Dokumen Evaluasi Berhasil Dihapus');
    }
}
