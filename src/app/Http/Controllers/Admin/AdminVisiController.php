<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Visimisi;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminVisiController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Visimisi::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('visi', 'like', "%{$search}%")
                    ->orWhere('misi', 'like', "%{$search}%");
            });}
        $visi_misis = $query->latest()->get();
        return view('admin.visi.dashboard', compact('visi_misis'));
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
        'visi' => 'required',
        'misi' => 'required',
        
    ]);

    Visimisi::create([
        'visi' => $request->visi,
        'user_id' => Auth::id(),
        'misi' => $request->misi,
    ]);

    return redirect()->route('visi.dashboard')->with('success', 'Visi Misi Berhasil Ditambahkan');
    }
    public function edit(Visimisi $visi)
    {
        return view('admin.visi.edit', compact('visi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visimisi $visi)
    {
        $visi->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);
        return redirect()->route('visi.dashboard')->with('success', 'Visi Misi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visimisi $visi)
    {
    $visi->delete();

    return redirect()->route('visi.dashboard')->with('success', 'Visi Misi berhasil dihapus');
    }
    public function show(Visimisi $visi)
{
    return view('admin.visi.show', compact('visi'));
}
}
