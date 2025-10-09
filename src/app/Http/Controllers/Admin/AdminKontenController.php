<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminKontenController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Konten::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });}
        $kontens = $query->latest()->get();
        return view('admin.konten.dashboard', compact('kontens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konten = Konten::all();
        return view('admin.konten.create', compact('konten'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'deskripsi' => 'nullable',
        'img' => 'nullable|image|mimes:jpg,jpeg,png',
        'video' => 'nullable|mimes:mp4,avi,mov|max:102400'
    ]);
        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('konten', $filename);
        }
        $filenameVideo = null;
        if ($request->hasFile('video')) {
        $file = $request->file('video');
        $filenameVideo = $file->getClientOriginalName();
        $file->storeAs('konten', $filenameVideo);
    }
    Konten::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'img' => $filename,
        'video' => $filenameVideo,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('konten.dashboard')->with('success', ' Konten Berhasil Ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konten $konten)
    {
        return view('admin.konten.edit', compact('konten'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konten $konten)
    {
        $filename = $konten->img;
        if ($request->hasFile('img')) {
            if ($konten->img) {
                Storage::delete('public/konten/' . $konten->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('konten', $filename);
        }
        $filenameVideo = $konten->video;
        if ($request->hasFile('video')) {
            if ($konten->video) {
                Storage::delete('public/konten/' . $konten->video);
            }
            $file = $request->file('video');
            $filenameVideo =  $file->getClientOriginalName();
            $file->storeAs('konten', $filenameVideo);
        }
        $konten->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'img' => $filename,
        'video' => $filenameVideo,
        ]);
        return redirect()->route('konten.dashboard')->with('success', 'Konten Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konten $konten)
    {
        if ($konten->img) {
        Storage::delete('public/konten/' . $konten->img);
    }
    $konten->delete();
    return redirect()->route('konten.dashboard')->with('success', 'Konten berhasil dihapus');
    }
    public function show(Konten $konten)
    {
    return view('admin.konten.show', compact('konten'));
    }
}
