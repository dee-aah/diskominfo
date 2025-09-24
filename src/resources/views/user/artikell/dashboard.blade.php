<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto flex-1  min-h-screen ml-2 ">
        @if (session('success'))
            <div id="flash-message"
                class="bg-green-100 max-w-5xl text-center border-green-400 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div id="flash-message"
                class="flex items-center m-3 justify-between bg-red-500 text-white px-4 py-2 rounded mb-4">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()"></button>
            </div>
        @endif

        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex justify-between px-3 grid grid-cols-3 items-center ">
                <div class="justify-start ml-4 col-1">
                    <h2 class="text-xl  font-medium">Daftar Artikel</h2>
                </div>
                <div class="col-span-2 flex py-5 justify-end">
                    <form action="{{ route('artikell.dashboard') }}" method="GET" class="flex justify-end  mr-2">
                        <div class="relative w-full max-w-xs">
                            <span class="absolute inset-y-0 left-0 flex pt-1 items-center pl-3">
                                <i class="fa-solid fa-magnifying-glass mr-2 mt-1"></i></span>
                            <input type="text" name="d" value="{{ request('d') }}"
                                placeholder="Cari Artikel..."
                                class="border-1 border-gray-300 rounded-xl mt-2 pr-4 mr-2 pl-10 py-2 placeholder:text-sm
                            placeholder:italic   w-full    text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <a href="{{ route('artikell.create') }}" type="button"
                            class="bg-blue-500 space-x-2 flex justify-end  ml-2 hover:bg-blue-600 text-white text-sm mt-2 px-3 mr-2 py-2 rounded-lg">
                            <i class="fa-solid fa-plus mr-2 mt-1 "></i> Tambah
                        </a>
                </div>
            </div>
            <div id="main-content" class="p-5 border-t border-gray-200 sm:p-6 ">
                <div class=" rounded border  border-gray-200 bg-white  ">
                    <div class="w-full ">
                        <table class="table-auto w-full  text-sm">
                            <thead class="border-b  border-gray-200">
                                <tr class="border-gray-200 border-b ">
                                    <th class="font-medium border-r  border-gray-200 p-3">Gambar</th>
                                    <th class="font-medium border-r  border-gray-200 p-3">Judul</th>
                                    <th class="font-medium border-r  border-gray-200 p-3">Penulis</th>
                                    <th class="font-medium border-r  border-gray-200 p-3">Kategori</th>
                                    <th class="font-medium border-r  border-gray-200 p-3">View</th>
                                    <th class="font-medium p-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($artikels as $artikel)
                                    <tr class="text-center mx-3 items-center hover:bg-gray-100 ">
                                        <td class="border-r  border-gray-200 p-3 text-center">
                                            @if ($artikel->img)
                                                <img src="{{ asset('storage/artikel/' . $artikel->img) }}"
                                                    class="w-16 h-16 object-cover mx-auto justify-content-center rounded">
                                            @else
                                                -
                                            @endif
                                        <td class="border-r  border-gray-200 p-3">{{ $artikel->judul }}</td>
                                        <td class="border-r  border-gray-200 p-3">{{ $artikel->penulis }}</td>
                                        <td class="border-r  border-gray-200 p-3">{{ $artikel->kategori }}</td>
                                        <td class="border-r  border-gray-200 p-3">{{ $artikel->view_count }}</td>
                                        </td>
                                        <td class="p-3  align-middle relative z-10">
                                            <el-dropdown class="inline-block">
  <button class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring-1 inset-ring-white/5 hover:bg-white/20">

      <i class="fa-solid fa-ellipsis " style="color: black" data-slot="icon" aria-hidden="true"></i>
  </button>

  <el-menu anchor="bottom end" popover class="w-56 origin-top-right rounded-md bg-gray-800 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
    <div class="py-1">
      <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Account settings</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Support</a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">License</a>
      <form action="#" method="POST">
        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Sign out</button>
      </form>
    </div>
  </el-menu>
</el-dropdown>
                                            {{-- <el-dropdown class="inline-block">
                                                <!-- Tombol titik tiga -->
                                                <button type="button" class="btn-aksi p-2 rounded hover:bg-gray-100"
                                                    data-id="{{ $artikel->id }}">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>

                                                <!-- Dropdown -->
                                                <div id="menu-{{ $artikel->id }}"
                                                    class="menu-aksi hidden absolute right-0 mt-2 w-44 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-[99999]">
                                                    <div class="py-1">
                                                        <a href="{{ route('artikell.edit', $artikel->id) }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                            👁️ Lihat Detail
                                                        </a>
                                                        <a href="{{ route('artikell.edit', $artikel->id) }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                            ✏️ Edit Artikel
                                                        </a>
                                                        <form action="{{ route('artikell.destroy', $artikel->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin hapus artikel ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="flex w-full items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                                🗑️ Hapus Artikel
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                    </div> --}}
                    </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center">Belum ada artikel</td>
                    </tr>
                    @endforelse
                    </tbody>
                    </table>

                </div>
            </div>
            <div class="mt-4">
                {{ $artikels->links('pagination::tailwind') }}
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

        document.addEventListener('DOMContentLoaded', function() {
            // cari semua tombol titik 3
            document.querySelectorAll('.btn-aksi').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation(); // penting biar nggak kena listener window

                    // tutup semua menu dulu
                    document.querySelectorAll('.menu-aksi').forEach(m => m.classList.add('hidden'));

                    // buka menu sesuai id tombol
                    const menu = document.getElementById('menu-' + this.dataset.id);
                    if (menu) menu.classList.toggle('hidden');
                });
            });

            // kalau klik di luar → tutup semua
            window.addEventListener('click', function(e) {
                if (!e.target.closest('.btn-aksi') && !e.target.closest('.menu-aksi')) {
                    document.querySelectorAll('.menu-aksi').forEach(m => m.classList.add('hidden'));
                }
            });
        });
    </script>
</x-layouts.sidebar>
