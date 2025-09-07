<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto flex-1  min-h-screen ml-2 ">
        @if (session('success'))
            <div id="flash-message" class="bg-green-300 max-w-5xl text-center text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex justify-between px-3 grid grid-cols-3 items-center ">
                <div class="justify-start ml-4 col-1">
                    <h2 class="text-xl  font-medium">Daftar Produk Hukum</h2>
                </div>
                <div class="col-span-2 flex py-5 justify-end">
                    <form action="{{ route('produk_hukum.dashboard') }}" method="GET" class="flex justify-end  mr-2">
                        <div class="relative w-full max-w-xs">
                        <span class="absolute inset-y-0 left-0 flex pt-1 items-center pl-3">
                            <i class="fa-solid fa-magnifying-glass mr-2 mt-1"></i></span>
                        <input type="text" name="d" value="{{ request('d') }}" placeholder="Cari Produk Hukum..."
                            class="border-1 border-gray-300 rounded-xl mt-2 pr-4 mr-2 pl-10 py-2 placeholder:text-sm
                            placeholder:italic   w-full    text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    <a href="{{ route('produk_hukum.create') }}" type="button"
                        class="bg-blue-500 space-x-2 flex justify-end  ml-2 hover:bg-blue-600 text-white text-sm mt-2 px-3 mr-2 py-2 rounded-lg">
                        <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah
                    </a>
                </div>
            </div>
            <div class="p-5 border-t border-gray-200 sm:p-6">
            <div class="overflow-hidden rounded border  border-gray-200 bg-white pb-3  ">
                <div id="main-content" class="w-full overflow-x-auto">
                    <table id="wrapper" class="table-auto wrapper min-w-full text-sm">
                        <thead>
                            <tr class="border-gray-200 border-b ">
                                <th class="font-medium px-3 py-3">Registrasi</th>
                                <th class="font-medium px-3 py-3">Jenis Peraturan</th>
                                <th class="font-medium px-3 py-3">Judul Peraturan</th>
                                <th class="font-medium px-3 py-3">Nomor</th>
                                <th class="font-medium px-3 py-3">Tahun Terbit</th>
                                <th class="font-medium px-3 py-3">Singkatan Jenis</th>
                                <th class="font-medium px-3 py-3">Tahun Penetapan</th>
                                <th class="font-medium px-3 py-3">Tanggal Pengundangan</th>
                                <th class="font-medium px-3 py-3">Pengarang</th>
                                <th class="font-medium px-3 py-3">Sumber</th>
                                <th class="font-medium px-3 py-3">Tempat Terbit</th>
                                <th class="font-medium px-3 py-3">Bidang Hukum</th>
                                <th class="font-medium px-3 py-3">Subjek</th>
                                <th class="font-medium px-3 py-3">Bahasa</th>
                                <th class="font-medium px-3 py-3">Lokasi</th>
                                <th class="font-medium px-3 py-3">Status</th>
                                {{-- <th class="px-4 border border-gray-400 border-2 py-2">Lampiran</th>
                    <th class="px-4 border border-gray-400 border-2 py-2">Naskah Akademik</th> --}}
                                <th class="font-medium px-3 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 ">
                            @forelse ($produks as $produk)
                                <tr class="text-center mx-3 items-center hover:bg-gray-100">
                                    <td class=" px-3 py-3">{{ $produk->reg }}</td>
                                    <td class=" px-3 py-3">{{ $produk->jenis_peraturan }}</td>
                                    <td class=" px-3 py-3">{{ $produk->judul_peraturan }}</td>
                                    <td class=" px-3 py-3">{{ $produk->nomor }}</td>
                                    <td class=" px-3 py-2">{{ $produk->tahun_terbit }}</td>
                                    <td class=" px-3 py-2">{{ $produk->singkatan_jenis }}</td>
                                    <td class=" px-3 py-2">{{ $produk->tahun_penetapan }}</td>
                                    <td class=" px-3 py-2">{{ $produk->tanggal_pengundangan }}</td>
                                    <td class=" px-3 py-2">{{ $produk->pengarang }}</td>
                                    <td class=" px-3 py-2">{{ $produk->sumber }}</td>
                                    <td class=" px-3 py-2">{{ $produk->tempat_terbit }}</td>
                                    <td class=" px-3 py-2">{{ $produk->bidang_hukum }}</td>
                                    <td class=" px-3 py-2">{{ $produk->subjek }}</td>
                                    <td class=" px-3 py-2">{{ $produk->bahasa }}</td>
                                    <td class=" px-3 py-2">{{ $produk->lokasi }}</td>
                                    <td class=" px-3 py-2">{{ $produk->status }}</td>
                                    {{-- <td class="px-4 border border-gray-400 border-2 py-2">
                            @if ($produk->lampiran)
                                <iframe src="{{ asset('storage/produk/' . $produk->lampiran) }}"
                                    class="w-16 h-16 object-cover justify-content-center rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 border border-gray-400 border-2 py-2">
                            @if ($produk->naskah_akademik)
                                <iframe src="{{ asset('storage/produk/' . $produk->naskah_akademik) }}"
                                    class="w-16 h-16 object-cover justify-content-center rounded">
                            @else
                                -
                            @endif
                        </td> --}}
                                    <td
                                        class="px-3 py-3 flex  ">
                                        <a href="{{ route('produk_hukum.edit', $produk->id) }}"
                                            class=" col-span-2  p-3  ">
                                            <i class="fa-solid fa-pen text-gray-600 hover:text-yellow-500 cursor-pointer"></i>
                                        </a>
                                        <form action="{{ route('produk_hukum.destroy', $produk->id) }}" method="POST"
                                            onsubmit="return confirm(' Anda Yakin Ingin Menghapus Produk Hukum ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class=" col-span-2 p-3  ">
                                                <i class="fa-solid fa-trash text-gray-600 hover:text-red-500 cursor-pointer"> </i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="24" class="text-center border border-gray-400 border-2 py-4">Belum
                                        ada Produk Hukum</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div></div>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('toggleAksi').addEventListener('click', function() {
            const aksiKoloms = document.querySelectorAll('.aksi');
            aksiKoloms.forEach(function(el) {
                el.classList.toggle('hidden');
            });
        })
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
