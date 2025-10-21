<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maklumat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMaklumatController extends Controller
{
    public function dashboard(Request $request)
    {
    $query = Maklumat::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('bidang', 'like', "%{$search}%")
                    ->orWhere('uraian', 'like', "%{$search}%");
            });}
        $maklumats = $query->latest()->get();
        return view('admin.maklumat.dashboard', compact('maklumats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maklumats = Maklumat::all();
        return view('admin.maklumat.create', compact('maklumats'));
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
            $file->storeAs('maklumat1', $filename);
        }
    Maklumat::create([
        'deskripsi' => $request->deskripsi,
        'img' => $filename,
        'user_id' => Auth::id(),

    ]);

    return redirect()->route('maklumat.dashboard')->with('success', 'Maklumat Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maklumat $maklumat)
    {
        return view('admin.maklumat.edit', compact('maklumat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maklumat $maklumat)
    {

        $filename = $maklumat->img;
        if ($request->hasFile('img')) {
            if ($maklumat->img) {
                Storage::delete('public/maklumat/' . $maklumat->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('maklumat1', $filename);
        }
        $maklumat->update([
        'deskripsi' => $request->deskripsi,
        'img' => $filename
        ]);
        return redirect()->route('maklumat.dashboard')->with('success', 'Maklumat Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maklumat $maklumat)
    {
        if ($maklumat->img) {
        Storage::delete('public/maklumat1/' . $maklumat->img);
    }
    $maklumat->delete();

    return redirect()->route('maklumat.dashboard')->with('success', 'Maklumat berhasil dihapus');
    }
    public function show(Maklumat $maklumat)
    {
        return view('Admin.maklumat.show', compact('maklumat'));
    }
}
