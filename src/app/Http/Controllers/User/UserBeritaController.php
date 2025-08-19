<?php

namespace App\Http\Controllers\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


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
        $beritas = $query->latest()->paginate(15);

        return view('user.berita.dashboard', compact('beritas'));
    }

    /**
     * Helper method untuk mengambil berita berdasarkan nama kategori.
     * Ini untuk menghindari penulisan query yang berulang-ulang.
     */
    private function getBeritaByKategori(array $kategoriNames, string $orderByColumn, int $limit)
    {
        return Berita::with('kategori')
            ->whereHas('kategori', function ($query) use ($kategoriNames) {
                $query->whereIn('nama', $kategoriNames);
            })
            ->orderBy($orderByColumn, 'desc')
            ->take($limit)
            ->get();
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        $kategoris = Kategori::where('type', 'Berita')->get();
        return view('user.berita.create', compact('kategoris'));
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
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->storeAs('berita', $filename);
        }

        return redirect()->route('user.berita.dashboard')->with('success', 'Berita Berhasil Ditambahkan');
    }



    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit(string $id)
    {
        $kategoris = Kategori::where('type', 'Berita')->get();
        $berita = Berita::findOrFail($id);
        return view('user.berita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Memperbarui berita di database.
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $filename = $berita->gambar;
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::delete('public/berita/' . $berita->gambar);
            }
            $file = $request->file('gambar');
            $filename =  $file->getClientOriginalName();
            $file->storeAs('berita', $filename);
        }

        $berita->update($request->except('gambar') + ['gambar' => $filename]);

        return redirect()->route('user.berita.dashboard')->with('success', 'Berita Berhasil Diperbarui');
    }

    /**
     * Menghapus berita dari database.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            Storage::delete('public/berita/' . $berita->gambar);
        }
        $berita->delete();

        return redirect()->back()->with('success', 'Berita Berhasil Dihapus');
    }
}
