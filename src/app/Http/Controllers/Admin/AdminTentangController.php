<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTentangController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Tentang::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $tentangs = $query->latest()->get();
        return view('admin.tentang_kami.dashboard', compact('tentangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tentangs = Tentang::all();
        return view('admin.tentang_kami.create', compact('tentangs'));
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
            $file->storeAs('tentang', $filename);
        }
    Tentang::create([
        'deskripsi' => $request->deskripsi,
        'img' => $filename,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('tentang_kami.dashboard')->with('success', 'Tentang Kami Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tentang $tentang_kami)
    {
    return view('admin.tentang_kami.edit', compact('tentang_kami'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tentang $tentang_kami)
    {

        $filename = $tentang_kami->img;
        if ($request->hasFile('img')) {
            if ($tentang_kami->img) {
                Storage::delete('public/tentang/' . $tentang_kami->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('tentang', $filename);
        }
        $tentang_kami->update([
        'deskripsi' => $request->deskripsi,
        'img' => $filename
        ]);
        return redirect()->route('tentang_kami.dashboard')->with('success', 'Tentang Kami Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tentang $tentang_kami)
{
    if ($tentang_kami->img && Storage::exists('public/tentang/' . $tentang_kami->img)) {
        Storage::delete('public/tentang/' . $tentang_kami->img);
    }

    $tentang_kami->delete();

    return redirect()->route('tentang_kami.dashboard')
        ->with('success', 'Data Tentang Kami berhasil dihapus.');
}
    
    public function show(Tentang $tentang_kami)
    {
    return view('admin.tentang_kami.show', compact('tentang_kami'));
    }

}
