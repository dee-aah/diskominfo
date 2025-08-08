<x-layouts.sidebar>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <div class="justify-start col-1">
                <h2 class="text-2xl  font-bold">Daftar Artikel</h2>
            </div>
            <div class="col-4 flex justify-end">
                <form action="{{ route('artikel.dashboard') }}" method="GET" class="flex justify-end mb-4">
                    <input type="text" name="d" value="{{ request('d') }}" placeholder="Cari Artikel..."
                        class="border rounded-l mt-2 px-3 py-2 focus:outline-none">
                    <button type="submit" class="bg-blue-500 mr-2 hover:bg-blue-600 text-white px-4 py-2 rounded-r">
                        Cari
                    </button>
                </form>
                <button id="toggleAksi"
                    class="bg-green-600 space-x-2 flex   mr-2   hover:bg-green-500 text-white px-4 py-2 rounded">
                    <i class="fa-solid fa-check mr-2 mt-1"></i> Pilih
                </button>
                <a href="{{ route('artikel.create') }}" type="button"
                    class="bg-blue-600 space-x-2 flex justify-end  ml-2 hover:bg-blue-500 text-white px-4 py-2 rounded">
                    <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah Artikel
                </a>
            </div>
        </div>

        @if (session('success'))
            <div id="flash-message" class="bg-green-100 text-center text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border text-sm">
            <thead>
                <tr class="bg-blue-100 text-center">
                    <th class="px-2 border border-blue-400 py-2">No</th>
                    <th class="px-4 border border-blue-400 py-2">Judul</th>
                    <th class="px-4 border border-blue-400 py-2">Penulis</th>
                    <th class="px-4 border border-blue-400 py-2">Isi</th>
                    <th class="px-4 border border-blue-400 py-2">Tag</th>
                    <th class="px-4 border border-blue-400 py-2">Gambar</th>
                    <th class="px-4 border aksi hidden border-blue-400 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikels as $artikel)
                    <tr class="text-center items-center ">
                        <td class="px-2 border border-blue-400 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $artikel->judul }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $artikel->penulis }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $artikel->isi }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $artikel->tag ?? '-' }}</td>
                        <td class="px-4 border border-blue-400 py-2">
                            @if ($artikel->gambar)
                                <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}"
                                    class="w-16 h-16 object-cover justify-content-center rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-3 flex grid grip-rows justify-center aksi hidden">
                            <a href="{{ route('artikel.edit', $artikel->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white col-span-2 px-2 py-3 mb-2 rounded">
                                <i class="fa-solid fa-pen mr-2"></i>Edit
                            </a>
                            <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST"
                                onsubmit="return confirm(' Anda Yakin ingin menghapus artikel ini?')">
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
                        <td colspan="5" class="text-center py-4">Belum ada artikel</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Modal Tambah Artikel -->

    </div>
    <script>
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
