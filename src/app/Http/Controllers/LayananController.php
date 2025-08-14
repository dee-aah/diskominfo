<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Program;
use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
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
        return view('layanan.dashboard', compact('layanans'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $programs = Program::with('layanans')->get();
        $programlain = Program::with('layanans')->skip(1)->take(3)->get();
        return view('layanan.index', compact('programs','programlain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('layanan.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'des_singkat' => 'required',
        'deskripsi' => 'required',
        'program_id' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('program', $filename);
        }

    Layanan::create([
        'nama' => $request->nama,
        'program_id' => $request->program_id,
        'des_singkat' => $request->des_singkat,
        'deskripsi' => $request->deskripsi,
        'gambar' => $filename
    ]);

    return redirect()->route('layanan.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
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
        $programs = Program::all();
        $layanan = Layanan::findOrFail($id);
        return view('layanan.edit', compact('layanan','programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('layanan', $filename);
        } else {
            $filename = $layanan->gambar;
        }
        $layanan->update([
            'nama' => $request->nama,
            'des_singkat' => $request->des_singkat,
            'deskripsi' => $request->deskripsi,
            'program_id' => $request->program_id,
            'gambar' => $filename
        ]);
        return redirect()->route('layanan.dashboard')->with('success', 'Layanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        if ($layanan->gambar) {
            Storage::delete('public/layanan/' . $layanan->gambar);
        }
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan Berhasil Dihapus');
    }
}
