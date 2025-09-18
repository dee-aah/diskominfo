<x-layouts.app>
    <div class="container max-w-6xl mx-auto px-4 py-8 mt-20">
            <h2 class="text-xl justify-start font-semibold  bg-gray-300 pl-5 h-10 pt-1 w-90">
                Daftar  {{ $kategori->nama }}
            </h2>
    <hr class="w-full border-t-2 border-gray-400 mb-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        @foreach ($beritas as $berita)
            <div class="p-4 rounded shadow-sm  bg-white">
                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                     alt="{{ $berita->judul }}" class="w-full h-48 object-cover rounded">

                <h2 class="mt-2 text-lg font-bold hover:text-blue-600">
                    <a href="{{ route('beritakita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                </h2>
                <a href="{{ route('beritakita.show', $berita->slug) }}" class="text-gray-500 my-4  text-center text-[11px]">
                    BACA SELENGKAPNYA...
                </a>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
            {{ $beritas->links() }}
        </div>
</div>
</x-layouts.app>
