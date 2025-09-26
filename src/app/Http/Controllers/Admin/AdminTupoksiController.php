<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tupoksi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminTupoksiController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Tupoksi::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('tugas', 'like', "%{$search}%")
                    ->orWhere('fungsi', 'like', "%{$search}%");
            });}
        $tupoksis = $query->latest()->get();
        return view('admin.tupoksii.dashboard', compact('tupoksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tupoksis = Tupoksi::all();
        return view('admin.tupoksii.create', compact('tupoksis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'tugas' => 'required',
        'fungsi' => 'required'
    ]);
    Tupoksi::create([
        'tugas' => $request->tugas,
        'fungsi' => $request->fungsi,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('tupoksii.dashboard')->with('success', 'Tupoksi Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tupoksi $tupoksii)
    {
        return view('admin.tupoksii.edit', compact('tupoksii'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tupoksi $tupoksii)
    {
        $tupoksii->update([
        'tugas' => $request->tugas,
        'fungsi' => $request->fungsi,
        ]);
        return redirect()->route('tupoksii.dashboard')->with('success', 'Tupoksi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tupoksi $tupoksii)
    {
    $tupoksii->delete();

    return redirect()->route('tupoksii.dashboard')->with('success', 'Tupoksi berhasil dihapus');
    }
    public function show(Tupoksi $tupoksii)
{
    return view('admin.tupoksii.show', compact('tupoksii'));
}
}
