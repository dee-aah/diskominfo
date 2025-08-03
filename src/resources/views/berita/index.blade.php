<x-layouts.sidebar>
    <div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Daftar Berita</h2>
        <button onclick="toggleModal(true)" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Berita
        </button>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Slug</th>
                <th class="border px-4 py-2">Penulis</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Isi</th>
                <th class="border px-4 py-2">Tag</th>
                <th class="border px-4 py-2">Gambar</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beritas as $index => $berita)
                <tr>
                    <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $berita->judul }}</td>
                    <td class="border px-4 py-2 text-sm text-gray-600">{{ $berita->slug }}</td>
                    <td class="border px-4 py-2">{{ $berita->penulis }}</td>
                    <td class="border px-4 py-2">{{ $berita->kategori->nama ?? '-' }}</td>
                    <td class="border px-4 py-2 line-clamp-3">{{ Str::limit(strip_tags($berita->isi), 100) }}</td>
                    <td class="border px-4 py-2">{{ $berita->tag }}</td>
                    <td class="border px-4 py-2">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="gambar berita" class="w-32 h-auto">
                        @endif
                    </td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('berita.edit', $berita->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4">Belum ada berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah Berita -->
<div id="modalBerita" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <h2 class="text-xl font-semibold mb-4">Tambah Berita</h2>
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <input type="text" name="judul" placeholder="Judul" class="border p-2 rounded w-full" required>

                <textarea name="isi" placeholder="Isi berita" class="border p-2 rounded w-full" rows="5" required></textarea>

                <input type="text" name="penulis" placeholder="Penulis" class="border p-2 rounded w-full" required>

                <input type="text" name="tag" placeholder="Tag (pisahkan dengan koma)" class="border p-2 rounded w-full" required>

                <select name="kategori_id" class="border p-2 rounded w-full required">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>

                <input type="file" name="gambar" accept="image/*" class="border p-2 rounded w-full required">
            </div>

            <div class="mt-4 flex justify-end space-x-2">
                <button type="button" onclick="toggleModal(false)" class="px-4 py-2 border rounded">Batal</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>

        <!-- Tombol close -->
        <button onclick="toggleModal(false)" class="absolute top-2 right-2 text-gray-600 hover:text-red-600 text-2xl leading-none">&times;</button>
    </div>
</div>

<script>
    function toggleModal(show) {
        const modal = document.getElementById('modalBerita');
        if (show) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }
</script>

</x-layouts.sidebar>
