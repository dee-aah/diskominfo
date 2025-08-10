<x-layouts.sidebar>
     <div class="p-6">
        <div class="flex justify-between grid grid-cols-3 items-center mb-4">
            <div class="justify-start col-1">
                <h2 class="text-2xl  font-bold">Daftar Berita</h2>
            </div>
            <div class="col-span-2 flex justify-end">
                <form action="{{ route('beritakita.dashboard') }}" method="GET" class="flex justify-end  mr-2">
                    <input type="text" name="d" value="{{ request('d') }}" placeholder="Cari Berita..."
                        class="border rounded mt-2 px-3 mr-2 py-2 focus:outline-none">
                    <button type="submit" class="bg-blue-500  hover:bg-blue-600 text-white mt-2 px-3 mr-2 py-2  rounded">
                        <i class="fa-solid fa-magnifying-glass mr-2 mt-1"></i>Cari
                    </button>
                </form>
                <button id="toggleAksi"
                    class="bg-green-600 space-x-2 flex   mr-2   hover:bg-green-500 text-white mt-2 px-3 mr-2 py-2  rounded">
                    <i class="fa-solid fa-check mr-2 mt-1"></i> Pilih
                </button>
                <a href="{{ route('beritakita.create') }}" type="button"
                    class="bg-blue-600 space-x-2 flex justify-end  ml-2 hover:bg-blue-500 text-white mt-2 px-3 mr-2 py-2 rounded">
                    <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah Berita
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
                    <th class="px-4 border border-blue-400 py-2">Deskripsi</th>
                    <th class="px-4 border border-blue-400 py-2">Tag</th>
                    <th class="px-4 border border-blue-400 py-2">Gambar</th>
                    <th class="px-4 border aksi hidden border-blue-400 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $berita)
                    <tr class="text-center items-center ">
                        <td class="px-2 border border-blue-400 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $berita->judul }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $berita->penulis }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $berita->deskripsi }}</td>
                        <td class="px-4 border border-blue-400 py-2">{{ $berita->tag ?? '-' }}</td>
                        <td class="px-4 border border-blue-400 py-2">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                                    class="w-16 h-16 object-cover justify-content-center rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-3 flex grid grip-rows border border-blue-400 justify-center aksi hidden">
                            <a href="{{ route('beritakita.edit', $berita->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white col-span-2 px-2 py-3 mb-2 rounded">
                                <i class="fa-solid fa-pen mr-2"></i>Edit
                            </a>
                            <form action="{{ route('beritakita.destroy', $berita->id) }}" method="POST"
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
                        <td colspan="5" class="text-center border border-blue-400 py-4">Belum ada Berita</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

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
