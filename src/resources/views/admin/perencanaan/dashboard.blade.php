<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto flex-1  min-h-screen ml-2  ">
        @if (session('success'))
            <div id="flash-message" class="bg-green-100 text-center text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
<div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex justify-between px-3 grid grid-cols-3 items-center ">
                <div class="justify-start ml-4 col-1">
                    <h2 class="text-xl  font-medium"> Dokumen Perencanaan </h2>
                </div>
                <div class="col-span-2 flex py-5 justify-end">
                    <form action="{{ route('perencanaan.dashboard') }}" method="GET" class="flex justify-end  mr-2">
                        <div class="relative w-full max-w-xs">
                        <span class="absolute inset-y-0 left-0 flex pt-1 items-center pl-3">
                            <i class="fa-solid fa-magnifying-glass mr-2 mt-1"></i></span>
                        <input type="text" name="d" value="{{ request('d') }}" placeholder="Cari..."
                            class="border-1 border-gray-300 rounded-xl mt-2 pr-4 mr-2 pl-10 py-2 placeholder:text-sm
                            placeholder:italic   w-full    text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    <a href="{{ route('perencanaan.create') }}" type="button"
                        class="bg-blue-500 space-x-2 flex justify-end  ml-2 hover:bg-blue-600 text-white text-sm mt-2 px-3 mr-2 py-2 rounded-lg">
                        <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah
                    </a>
                </div>
            </div>
            <div id="main-content" class="p-5 border-t border-gray-200   sm:p-6">
            <div class="overflow-hidden rounded border  border-gray-200 bg-white pb-3  ">
                <div  class="w-full   overflow-x-auto">
                    <table  class="table-auto  wrapper min-w-full text-sm">
            <thead class="border-b border-gray-200">
                    <th class="font-medium border-r  border-gray-200 p-3">Deskripsi Singkat</th>
                    <th class="font-medium border-r  border-gray-200 p-3">Foto Konten</th>
                    <th class="font-medium border-r  border-gray-200 p-3">Nama Dokumen</th>
                    <th class="font-medium border-r  border-gray-200 p-3">Foto Pdf</th>
                    <th class="font-medium p-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($perencanaans as $perencanaan)
                    <tr class="text-center mx-3 items-center hover:bg-gray-100 ">
                        <td class="p-3 border-r  border-gray-200">{{ $perencanaan->des_singkat }}</td>
                        <td class="p-3 border-r  border-gray-200 text-center">
                            @if ($perencanaan->img_konten)
                                <img src="{{ asset('storage/perencanaan/' . $perencanaan->img_konten) }}"
                                    class="w-16 h-16 object-cover mx-auto rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="p-3 border-r  border-gray-200">{{ $perencanaan->nama }}</td>
                        <td class="p-3 border-r  border-gray-200 text-center">
                            @if ($perencanaan->img_pdf)
                                <img src="{{ asset('storage/perencanaan/' . $perencanaan->img_pdf) }}"
                                    class="w-16 h-16 object-cover mx-auto rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td class="p-3  align-middle ">
                            <div class="flex justify-center items-center gap-1">
                            <a href="{{ route('perencanaan.edit', $perencanaan->id) }}"
                                class="  p-3  ">
                                    <i class="fa-solid fa-pen text-gray-600 hover:text-yellow-500 cursor-pointer"></i>
                            </a>
                            <form action="{{ route('perencanaan.destroy', $perencanaan->id) }}" method="POST"
                                onsubmit="return confirm(' Anda Yakin Ingin Menghapus perencanaan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="  p-3  ">
                                    <i class="fa-solid fa-trash text-gray-600 hover:text-red-500 cursor-pointer"> </i>
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="p-3 mt-3 text-center">Belum ada perencanaan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</div>
                </div>
            </div>
        </div>
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
