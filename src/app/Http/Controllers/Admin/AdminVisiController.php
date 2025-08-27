<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Visimisi;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
class AdminVisiController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Visimisi::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('visi', 'like', "%{$search}%")
                    ->orWhere('misi', 'like', "%{$search}%")
                    ->orWhere('des_singkat', 'like', "%{$search}%");
            });}
        $visis = $query->latest()->get();
        return view('admin.visi.dashboard', compact('visis'));
    }
    public function create()
    {
        return view('admin.visi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'des_singkat' => 'required',
        'visi' => 'required',
        'misi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('visi', $filename);
        }

    Visimisi::create([
        'visi' => $request->visi,
        'des_singkat' => $request->des_singkat,
        'misi' => $request->misi,
        'gambar' => $filename
    ]);

    return redirect()->route('visi.dashboard')->with('success', 'Visi Misi Berhasil Ditambahkan');
    }
    public function edit(string $id)
    {
        $visi = Visimisi::findOrFail($id);
        return view('admin.visi.edit', compact('visi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visi = Visimisi::findOrFail($id);

        $filename = $visi->gambar;
        if ($request->hasFile('gambar')) {
            if ($visi->gambar) {
                Storage::delete('public/visi/' . $visi->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('visi', $filename);
        }

        $visi->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'des_singkat' => $request->des_singkat,
            'gambar' => $filename
        ]);
        return redirect()->route('visi.dashboard')->with('success', 'Visi Misi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visi = Visimisi::findOrFail($id);
        if ($visi->gambar) {
            Storage::delete('public/visi/' . $visi->gambar);
        }
        $visi->delete();

        return redirect()->back()->with('success', 'Visi Misi Berhasil Dihapus');
    }
}
