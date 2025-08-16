<?php

namespace App\Http\Controllers;

use App\Models\Visimisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiController extends Controller
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
        return view('visimisi.dashboard', compact('visis'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visimisi = Visimisi::first();
        return view("visimisi.index", compact('visimisi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visimisi.create');
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

    return redirect()->route('visimisi.dashboard')->with('success', 'Visi Misi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visi = Visimisi::findOrFail($id);
        return view('visimisi.edit', compact('visi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visi = Visimisi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('visi', $filename);
        } else {
            $filename = $visi->gambar;
        }

        $visi->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'des_singkat' => $request->des_singkat,
            'gambar' => $filename
        ]);
        return redirect()->route('visimisi.dashboard')->with('success', 'Visi Misi Berhasil Diperbarui');
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
