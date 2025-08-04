<x-layouts.sidebar>
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Daftar Artikel</h2>
        <button onclick="toggleModal(true)" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Artikel
        </button>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Judul</th>
                <th class="px-4 py-2">Penulis</th>
                <th class="px-4 py-2">Tag</th>
                <th class="px-4 py-2">Gambar</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($artikels as $artikel)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $artikel->judul }}</td>
                    <td class="px-4 py-2">{{ $artikel->penulis }}</td>
                    <td class="px-4 py-2">{{ $artikel->tag ?? '-' }}</td>
                    <td class="px-4 py-2">
                        @if ($artikel->gambar)
                            <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" class="w-16 h-16 object-cover rounded">
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('artikel.edit', $artikel->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-4">Belum ada artikel</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal Tambah Artikel -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Tambah Artikel</h3>
                <button onclick="toggleModal(false)" class="text-gray-600 hover:text-red-500 text-xl font-bold">&times;</button>
            </div>
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label class="block text-sm font-medium">Gambar</label>
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
