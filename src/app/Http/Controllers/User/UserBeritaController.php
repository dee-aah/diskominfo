<?php

namespace App\Http\Controllers\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserBeritaController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Berita::query()->with('kategori'); // Eager load relasi kategori

        if ($request->filled('d')) {
            $search = $request->d;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('tag', 'like', "%{$search}%");
            });
        }

        // PERBAIKAN: Menggunakan paginate() untuk performa yang lebih baik
        $beritas = Berita::paginate(5);
        return view('user.beritaa.dashboard', compact('beritas'));
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        $enumValues = DB::select("SHOW COLUMNS FROM beritas WHERE Field = 'kategori'");

        $kategoriOptions = [];
        if (!empty($enumValues)) {
                preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $kategoriOptions = explode("','", $matches[1]);
        }
        return view('user.beritaa.create', compact('kategoriOptions'));
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penulis' => 'required|string|max:100',
            'waktu' => 'required|date',
            'tag' => 'nullable|string',
            'kategori' => 'required',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $file->getClientOriginalName();
            $file->storeAs('berita', $filename);
        }
        Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'waktu' =>$request->waktu,
            'tag' => $request->tag,
            'kategori' => $request->kategori,
            'img' => $filename,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('beritaa.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
    }



    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit(Berita $berita )
    {
        $enumValues = DB::select("SHOW COLUMNS FROM artikels WHERE Field = 'kategori'");

        $kategoriOptions = [];
        if (!empty($enumValues)) {
                preg_match("/^enum\('(.*)'\)$/", $enumValues[0]->Type, $matches);
        $kategoriOptions = explode("','", $matches[1]);
        }
        return view('user.beritaa.edit', compact('berita', 'kategoriOptions'));
    }

    /**
     * Memperbarui berita di database.
     */
    public function update(Request $request, Berita $berita)
    {
        $filename = $berita->img;
        if ($request->hasFile('img')) {
            if ($berita->img) {
                Storage::delete('public/berita/' . $berita->img);
            }
            $file = $request->file('img');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('berita', $filename);
        }

        $berita->update($request->except('img') + ['img' => $filename]);

        return redirect()->route('beritaa.dashboard')->with('success', 'Berita Berhasil Diperbarui');
    }

    /**
     * Menghapus berita dari database.
     */
    public function destroy(Berita $berita)
    {
        if ($berita->img) {
        Storage::delete('public/berita/' . $berita->img);
    }
    $berita->delete();

    return redirect()->route('beritaa.dashboard')->with('success', 'Berita berhasil dihapus');
    }
    public function show(Berita $berita)
    {
        return view('user.beritaa.show', compact('berita'));
    }
}
