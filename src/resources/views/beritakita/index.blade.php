<x-layouts.sidebar>
<div class="p-6 bg-blue-50">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Daftar Berita</h2>
        <button onclick="toggleModal(true)" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Berita
        </button>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-blue-800 text-sm">
        <thead>
            <tr class="bg-blue-100 text-center">
                <th class="px-4 border border-blue-400 py-2">No</th>
                <th class="px-4 border border-blue-400 py-2">Judul</th>
                <th class="px-4 border border-blue-400 py-2">Penulis</th>
                <th class="px-4 border border-blue-400 py-2">Isi</th>
                <th class="px-4 border border-blue-400 py-2">Kategori</th>
                <th class="px-4 border border-blue-400 py-2">Tag</th>
                <th class="px-4 border border-blue-400 py-2">Gambar</th>
                <th class="px-4 border border-blue-400 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $berita)
                <tr class="text-center">
                    <td class="px-2 border border-blue-400 py-2">{{ $loop->iteration }}.</td>
                    <td class="px-4 border border-blue-400 py-2">{{ $berita->judul }}</td>
                    <td class="px-4 border border-blue-400 py-2">{{ $berita->penulis }}</td>
                    <td class="px-4 border border-blue-400 py-2">{{ $berita->isi }}</td>
                    <td class="px-4 border border-blue-400 py-2">{{ $berita->kategori->nama }}</td>
                    <td class="px-4 border border-blue-400 py-2">{{ $berita->tag ?? '-' }}</td>
                    <td class="px-4 border border-blue-400 py-2">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="w-16 h-16 object-cover rounded">
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('berita.edit', $berita->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">Belum ada berita</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal Tambah Berita -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Tambah Berita</h3>
                <button onclick="toggleModal(false)" class="text-gray-600 hover:text-red-500 text-xl font-bold">&times;</button>
            </div>
            <form action="{{ route('beritakita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium">Judul</label>
                    <input type="text" name="judul" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium">Isi</label>
                    <textarea name="isi" rows="3" class="w-full border rounded p-2" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium">Penulis</label>
                    <input type="text" name="penulis" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium">Tag</label>
                    <input type="text" name="tag" class="w-full border rounded p-2">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium">Kategori</label>
                    <select name="kategori_id" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium">Gambar </label>
                    <input type="file" name="gambar" class="w-full border rounded p-2">
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="toggleModal(false)"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleModal(show) {
        const modal = document.getElementById('modal');
        if (show) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    }
</script>
</x-layouts.sidebar>
