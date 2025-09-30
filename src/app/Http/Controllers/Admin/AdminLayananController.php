<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminLayananController extends Controller
{
    public function dashboard(Request $request)
    {

        $query = Layanan::query();
        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('urutan', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });}
        $layanans = $query->latest()->get();
        return view('admin.layanan.dashboard', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanans =Layanan::all();
        $enumValues = DB::select("SHOW COLUMNS FROM layanans WHERE Field = 'program'");
        preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $jenisOptions = explode("','", $matches[1]);
        return view('admin.layanan.create', compact('layanans','jenisOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'deskripsi_singkat' => 'required',
        'deskripsi' => 'required',
        'program' => 'required',
        'img' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan', $filename);
        }

    Layanan::create([
        'nama' => $request->nama,
        'program' => $request->program,
        'deskripsi_singkat' => $request->deskripsi_singkat,
        'deskripsi' => $request->deskripsi,
        'img' => $filename,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('layanan.dashboard')->with('success', 'Layanan  Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        $enumValues = DB::select("SHOW COLUMNS FROM layanans WHERE Field = 'program'");
        preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $jenisOptions = explode("','", $matches[1]);
        return view('admin.layanan.edit', compact('layanan','jenisOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan', $filename);
        } else {
            $filename = $layanan->gambar;
        }
        $layanan->update([
            'nama' => $request->nama,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi' => $request->deskripsi,
            'program' => $request->program,
            'imgr' => $filename
        ]);
        return redirect()->route('layanan.dashboard')->with('success', 'Layanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        if ($layanan->img) {
        Storage::delete('public/layanan/' . $layanan->img);
    }
    $layanan->delete();

    return redirect()->route('layanan.dashboard')->with('success', 'Layanan berhasil dihapus');
    }
    public function show(Layanan $layanan)
{
    return view('admin.layanan.show', compact('layanan'));
}
}
