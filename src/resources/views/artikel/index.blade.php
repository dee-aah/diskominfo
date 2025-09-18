<x-layouts.app>
    <main class="mx-auto max-w-6xl">
        {{-- Judul Section --}}
        <div class="max-w-6xl mx-auto mt-30">
            <div class="  flex  items-center  justify-between">
                <h1 class="text-[30px] font-semibold  py-3 ">Artikel</h1>
                <form action="{{ url()->current() }}" method="GET" class="relative">
                    <input type="text" name="d" value="{{ request('d') }}" placeholder="Cari Artikel..."
                        class="w-64 border border-gray-300 rounded-xl pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="absolute left-3 top-2 text-gray-400">
                        <i class="fa-solid fa-magnifying-glass mr-2 mt-1"></i>
                    </span>
                </form>
            </div>
            <hr class="w-full border-t-2 border-gray-400 mb-4">
        </div>
        <div id="articleGrid" class="grid grid-cols-1 sm:grid-cols-2 max-w-6xl mx-auto lg:grid-cols-3 my-6 gap-3">
            @forelse ($artikellain as $artikel)
                <div class="article-item bg-white rounded-lg shadow overflow-hidden">
                    <a href="{{ route('artikel.show', $artikel->slug) }}">
                        <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                            class="rounded w-full h-auto object-cover">
                    </a>
                    <div class="p-4">
                        <a href="{{ route('artikel.show', $artikel->slug) }}">
                            <h2 class="font-semibold text-[20px] mb-1"> {{ $artikel->judul }}</h2>
                        </a>
                        <div class="flex justify-between mt-6 mb-2">
                            <p class="text-gray-500 text-sm"><span>{{ $artikel->kategori->nama }}</span></p>
                            <p class="text-gray-500 text-sm">
                                <span>{{ $artikel->created_at->locale('id')->diffForHumans() }}</span></p>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 text-lg">Artikel tidak ditemukan.</p>
                </div>
            @endforelse
        </div>
    </main>
</x-layouts.app>
