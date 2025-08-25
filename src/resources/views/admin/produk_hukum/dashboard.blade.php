<x-layouts.sidebar>
    <div class="p-6">
        <div class="flex justify-between grid grid-cols-3 items-center mb-4">
            <div class="justify-start col-1">
                <h2 class="text-2xl  font-bold">Daftar Profil Pimpinan</h2>
            </div>
            <div class="col-span-2 flex justify-end">
                <form action="{{ route('produk_hukum.dashboard') }}" method="GET" class="flex justify-end  mr-2">
                    <input type="text" name="d" value="{{ request('d') }}" placeholder="Cari Produk ..."
                        class="border rounded mt-2 px-3 mr-2 py-2 focus:outline-none">
                    <button type="submit" class="bg-blue-500  hover:bg-blue-600 text-white mt-2 px-3 mr-2 py-2  rounded">
                        <i class="fa-solid fa-magnifying-glass mr-2 mt-1"></i>Cari
                    </button>
                </form>
                <button id="toggleAksi"
                    class="bg-green-600 space-x-2 flex   mr-2   hover:bg-green-500 text-white mt-2 px-3 mr-2 py-2  rounded">
                    <i class="fa-solid fa-check mr-2 mt-1"></i> Pilih
                </button>
                <a href="{{ route('produk_hukum.create') }}" type="button"
                    class="bg-blue-600 space-x-2 flex justify-end  ml-2 hover:bg-blue-500 text-white mt-2 px-3 mr-2 py-2 rounded">
                    <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah
                </a>
            </div>
        </div>

        @if (session('success'))
            <div id="flash-message" class="bg-green-100 text-center text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full table-auto border-gray-400 border-2 border text-sm">
            <thead>
                <tr class="bg-slate-300 text-center">
                    <th class="px-2 border border-gray-400 border-2 py-2">No</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Jenis Peraturan</th>
                    <th class="px-2 border border-gray-400 border-2 py-2">Judul Peraturan</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Nomor</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Tahun Terbit</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Singkatan Jenis</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Tahun Penetapan</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Tanggal Pengundangan</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Pengarang</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Sumber</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Tempat Terbit</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Bidang Hukum</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Subjek</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Bahasa</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Lokasi</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Status</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Lampiran</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Naskah Akademik</th>
                    <th class="px-4 border aksi hidden border-gray-400 border-2 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @forelse ($produks as $produk)
                    <tr class="text-center items-center ">
                        <td class="px-2 border border-gray-400 border-2 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->jenis_peraturan }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $Produk->judul_peraturan}}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->nomor }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->tahun_terbit }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->singkatan_jenis }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->tahun_penetapan }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->tanggal_pengundangan }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->pengarang}}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->sumber }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->tempat_terbit }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->bidang_hukum }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->subjek }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->bahasa }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->lokasi }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">{{ $produk->status }}</td>
                        <td class="px-4 border border-gray-400 border-2 py-2">
                            @if ($produk->lampiran)
                                <img src="{{ asset('storage/produk/' . $produk->lampiran) }}"
                                    class="w-16 h-16 object-cover justify-content-center rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 border border-gray-400 border-2 py-2">
                            @if ($produk->naskah_akademik)
                                <img src="{{ asset('storage/produk/' . $profil->naskah_akademik) }}"
                                    class="w-16 h-16 object-cover justify-content-center rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-3 py-3 flex grid grip-rows border border-gray-400 border-2 justify-center aksi hidden">
                            <a href="{{ route('produk_hukum.edit', $produk->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white col-span-2 px-2 py-3 mb-2 rounded">
                                <i class="fa-solid fa-pen mr-2"></i>Edit
                            </a>
                            <form action="{{ route('produk_hukum.destroy', $produk->id) }}" method="POST"
                                onsubmit="return confirm(' Anda Yakin Ingin Menghapus Produk Hukum ini?')">
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
                        <td colspan="20" class="text-center border border-gray-400 border-2 py-4">Belum ada Produk Hukum</td>
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
