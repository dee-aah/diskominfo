<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Uraian_tugas;

class UraianController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Uraian_tugas::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $uraians = $query->latest()->get();
        return view('admin.uraian.dashboard', compact('uraians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uraians = Uraian_tugas::all();
        return view('admin.uraian.create', compact('uraians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'bidang' => 'required',
        'uraian' => 'required',
    ]);

    Uraian_tugas::create([
        'bidang' => $request->bidang,
        'uraian' => $request->uraian,

    ]);

    return redirect()->route('uraian.dashboard')->with('success', 'Uraian Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $uraian = Uraian_tugas::findOrFail($id);
        return view('admin.uraian.edit', compact('uraian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uraian = Uraian_tugas::findOrFail($id);

        $uraian->update([
        'bidang' => $request->bidang,
        'uraian' => $request->uraian,
        ]);
        return redirect()->route('uraian.dashboard')->with('success', 'Uraian Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $uraian = Uraian_tugas::findOrFail($id);
        $uraian->delete();
        return redirect()->back()->with('success', 'Tupoksi Berhasil Dihapus');
    }
}
