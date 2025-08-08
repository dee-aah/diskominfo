<x-layouts.sidebar>
    <div class="p-6 bg-blue-50">
        <div class="flex grid grid-cols-3 justify-end mb-4">
            <div class="justify-start col-1">
                <h2 class="text-2xl  font-bold">Daftar Berita</h2>
            </div>
            <div class="col-3 flex justify-end">
                <button id="toggleAksi"
                    class="bg-green-600 space-x-2 flex   mr-2   hover:bg-green-500 text-white px-4 py-2 rounded">
                    <i class="fa-solid fa-check mr-2 mt-1"></i> Pilih
                </button>
                <button onclick="toggleModal(true)"
                    class="bg-blue-600 space-x-2 flex justify-end  ml-2 hover:bg-blue-500 text-white px-4 py-2 rounded">
                    <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah Berita
                </button>
            </div>

        </div>

        @if (session('success'))
            <div id="flash-message" class="bg-green-100 text-green-800 p-3 text-center rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse border border-blue-800 text-sm">
            <thead>
                <tr class="bg-blue-100 text-center">
                    <th class="px-2 border border-blue-400 py-2">No</th>
                    <th class="px-4 border border-blue-400 py-2">Judul</th>
                    <th class="px-4 border border-blue-400 py-2">Penulis</th>
                    <th class="px-4 border border-blue-400 py-2">Isi</th>
                    <th class="px-4 border border-blue-400 py-2">Kategori</th>
                    <th class="px-4 border border-blue-400 py-2">Tag</th>
                    <th class="px-4 border border-blue-400 py-2">Gambar</th>
                    <th class="px-4 border border-blue-400 py-2 aksi hidden">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $berita)
                    <tr class="text-center items-center ">
                        <td class="px-2 border border-blue-400 py-2">{{ $loop->iteration }}.</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $berita->judul }}</td>
                        <td class="px-3 border border-blue-400 py-2">{{ $berita->penulis }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $berita->isi }}</td>
                        <td class="px-3 border border-blue-400 py-2">{{ $berita->kategori->nama }}</td>
                        <td class="px-3 border border-blue-400 py-2">{{ $berita->tag ?? '-' }}</td>
                        <td class="px-3 border border-blue-400 py-2">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                                    class="w-16 h-16 object-cover justify-content-center rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-3 flex grid grip-rows justify-center aksi hidden">
                            <button onclick="openEditModal({{ $berita->id }})"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white col-span-2 px-2 py-3 mb-2 rounded">
                                <i class="fa-solid fa-pen mr-2"></i>Edit
                            </button>
                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 col-span-2 mt-2 py-3 px-3 text-white  rounded">
                                    <i class="fa-solid fa-trash"></i> Hapus
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
        <div id="modal" class="fixed inset-0 bg-green-50  bg-opacity-50 hidden items-center  justify-center z-50">
            <div class="bg-white  rounded-lg shadow-lg border-2 border-indigo-500 w-full my-8 max-w-180">
                <div class="flex justify-between  items-center m-4">
                    <div></div>
                    <div>
                        <h3 class="text-2xl justify-center font-bold">Tambah Berita</h3>
                    </div>
                    <div>
                        <button onclick="toggleModal(false)"
                            class="text-black hover:text-red-500 text-xl font-bold">&times;</button>
                    </div>

                </div>
                <form class="mx-8 " action="{{ route('beritakita.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-base font-medium">Judul</label>
                        <input type="text" name="judul" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Isi</label>
                        <textarea name="isi" rows="3" class="w-full border rounded p-2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Penulis</label>
                        <input type="text" name="penulis" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Tag</label>
                        <input type="text" name="tag" class="w-full border rounded p-2">
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Kategori</label>
                        <select name="kategori_id" class="w-full border rounded p-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Gambar </label>
                        <input type="file" name="gambar" class="w-full border rounded p-2">
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="toggleModal(false)"
                            class="bg-gray-400 hover:bg-gray-500 text-white mb-4 px-4 py-2 rounded">Batal</button>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white mb-4 px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div id="editModal-{{ $berita->id }}"
        class="fixed inset-0 bg-blue-50 bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white  rounded-lg shadow-lg border-2 border-indigo-500 w-full my-8 max-w-180">
            <h2 class="text-xl font-semibold mb-4">Edit Berita</h2>
            <form class="mx-8 " action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-base font-medium mb-1">Judul</label>
                    <input type="text" name="judul" value="{{ $berita->judul }}"
                        class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-base font-medium mb-1">Penulis</label>
                    <input type="text" name="penulis" value="{{ $berita->penulis }}"
                        class="w-full border px-3 py-2 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-base font-medium mb-1">Isi</label>
                    <textarea name="isi" rows="4" class="w-full border px-3 py-2 rounded">{{ $berita->isi }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-base font-medium">Kategori</label>
                    <select name="kategori_id" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-base font-medium mb-1">Tag</label>
                    <input type="text" name="tag" value="{{ $berita->tag }}"
                        class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-base font-medium mb-1">Gambar</label>
                    <input type="file" name="gambar" class="block w-full border px-2 py-1 rounded">
                    @if ($berita->gambar)
                        <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                        <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="w-32 mt-1 rounded">
                    @endif
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeEditModal({{ $berita->id }})"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </form>
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

        function openEditModal(id) {
            document.getElementById('editModal-' + id).classList.remove('hidden');
            document.getElementById('editModal-' + id).classList.add('flex');
        }

        function closeEditModal(id) {
            document.getElementById('editModal-' + id).classList.add('hidden');
            document.getElementById('editModal-' + id).classList.remove('flex');
        }
        document.getElementById('toggleAksi').addEventListener('click', function() {
            const aksiKoloms = document.querySelectorAll('.aksi');
            aksiKoloms.forEach(function(el) {
                el.classList.toggle('hidden');
            });
        });
         document.addEventListener('DOMContentLoaded', function() {
            const flash = document.getElementById('flash-message');
            if (flash) {
                setTimeout(() => {
                    flash.style.transition = 'opacity 0.5s ease';
                    flash.style.opacity = '0';
                    setTimeout(() => {
                        flash.remove();
                    }, 500); // tunggu animasi selesai sebelum dihapus
                }, 3000); // tunggu 3 detik
            }
        });
    </script>
</x-layouts.sidebar>
