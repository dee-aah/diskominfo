<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UraianTugas;
use Illuminate\Support\Facades\Auth;

class UraianController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = UraianTugas::query();
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
        $uraians = UraianTugas::all();
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

    UraianTugas::create([
        'bidang' => $request->bidang,
        'uraian' => $request->uraian,
        'user_id' => Auth::id(),

    ]);

    return redirect()->route('uraian.dashboard')->with('success', 'Uraian Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UraianTugas $uraian)
    {
        return view('admin.uraian.edit', compact('uraian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UraianTugas $uraian)
    {
        $uraian->update([
        'bidang' => $request->bidang,
        'uraian' => $request->uraian,
        ]);
        return redirect()->route('uraian.dashboard')->with('success', 'Uraian Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UraianTugas $uraian)
    {
    $uraian->delete();

    return redirect()->route('uraian.dashboard')->with('success', 'Uraian berhasil dihapus');
    }
    public function show(UraianTugas $uraian)
    {
    return view('admin.uraian.show', compact('uraian'));
    }
}
