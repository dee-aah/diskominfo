<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto flex-1  min-h-screen ml-2 ">

        @if (session('success'))
            <div id="flash-message" class="bg-green-100 border border-green-400 text-black flex justify-between max-w-5xl text-center  p-3 rounded mb-4">
                <div>
                </div>
                <div >
                    {{ session('success') }}
                </div>
                    <button onclick="this.parentElement.remove()"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif
        @if (session('error'))
        <div id="flash-message" class="flex items-center m-3 justify-between bg-red-500 text-white px-4 py-2 rounded mb-4">
            <div>
            </div>
            <div >
                <span>{{ session('error') }}</span>
            </div>
                <button onclick="this.parentElement.remove()"><i class="fa-solid fa-xmark"></i></button>
        </div>
        @endif
        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex justify-between px-3 grid grid-cols-3 items-center ">
                <div class="justify-start ml-4 col-1">
                    <h2 class="text-xl  font-medium">Tupoksi</h2>
                </div>
                <div class="col-span-2 flex py-5 justify-end">
                    <form action="{{ route('tupoksii.dashboard') }}" method="GET" class="flex justify-end  mr-2">
                        <div class="relative w-full max-w-xs">
                            <span class="absolute inset-y-0 left-0 flex pt-1 items-center pl-3">
                                <i class="fa-solid fa-magnifying-glass mr-2 mt-1"></i></span>
                            <input type="text" name="d" value="{{ request('d') }}" placeholder="Cari..."
                                class="border-1 border-gray-300 rounded-xl mt-2 pr-4 mr-2 pl-10 py-2 placeholder:text-sm
                            placeholder:italic   w-full    text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <a href="{{ route('tupoksii.create') }}" type="button"
                            class="bg-blue-500 space-x-2 flex justify-end  ml-2 hover:bg-blue-600 text-white text-sm mt-2 px-3 mr-2 py-2 rounded-lg">
                            <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah
                        </a>
                </div>
            </div>
            <div id="main-content" class="p-5 border-t border-gray-200 sm:p-6">
                <div class="overflow-hidden rounded border  border-gray-200 bg-white pb-3  ">
                    <div class="w-full overflow-x-auto">

                        <table class="table-auto wrapper min-w-full text-sm">
                            <thead>
                                <tr class="border-gray-200 border-b">
                                    <th class="font-medium border-r  border-gray-200 p-3">Tugas </th>
                                    <th class="font-medium border-r  border-gray-200 p-3">Fungsi Utama</th>
                                    <th class="font-medium border-r  border-gray-200 p-3">Waktu Dibuat</th>
                                    <th class="font-medium p-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($tupoksis as $tupoksi)
                                    <tr class="text-center mx-3 items-center hover:bg-gray-100">
                                        <td class="p-3 border-r  border-gray-200">{!! Str::limit($tupoksi->tugas, 50) !!}</td>
                                        <td class="p-3 border-r  border-gray-200">{!! Str::limit($tupoksi->fungsi, 50) !!}</td>
                                        <td class="px-3 border-r  border-gray-200 py-3">
                                            {{ $tupoksi->created_at->translatedFormat('l d F Y.') }}</td>
                                        <td class="p-3  align-middle relative z-10">
                                            <el-dropdown class="inline-block">
                                                <button
                                                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring-1 inset-ring-white/5 hover:bg-white/20">
                                                    <i class="fa-solid fa-ellipsis " style="color: black"
                                                        data-slot="icon" aria-hidden="true"></i>
                                                </button>
                                                <el-menu anchor="bottom end" popover
                                                    class="w-56 origin-top-right bg-gray-100 shadow rounded-md font-medium border border-gray-300 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                                                    <div class="py-1">
                                                        <a href="{{ route('tupoksii.show', $tupoksi) }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">
                                                            <i class="fa-solid fa-eye px-3"></i> Lihat Detail
                                                        </a>
                                                        <a href="{{ route('tupoksii.edit', $tupoksi) }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-300">
                                                            <i class="fa-solid fa-pen text-gray-600 px-3"></i> Edit
                                                        </a>
                                                        <form action="{{ route('tupoksii.destroy', $tupoksi) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin hapus Tupoksi ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="flex w-full items-center font-medium gap-2 px-4 py-2 text-sm text-red-600 border-t border-gray-300 hover:bg-red-200">
                                                                <i class="fa-solid fa-trash text-gray-600 px-3"
                                                                    style="color: red">
                                                                </i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </el-menu>
                                            </el-dropdown>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-3 text-center">Belum ada Tupoksi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
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
