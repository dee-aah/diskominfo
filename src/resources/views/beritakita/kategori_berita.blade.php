<x-layouts.app>
    <div class="container max-w-6xl mx-auto px-4 py-8 mt-20">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">
        Semua Berita: {{ $kategori->nama }}
    </h1>
    <div class="h-1 w-24 bg-blue-600 mt-2 mb-6"></div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        @foreach ($beritas as $berita)
            <div class="p-4 rounded shadow-sm  bg-white">
                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                     alt="{{ $berita->judul }}" class="w-full h-48 object-cover rounded">

                <h2 class="mt-2 text-lg font-bold hover:text-blue-600">
                    <a href="{{ route('artikel.show', $berita->id) }}">{{ $berita->judul }}</a>
                </h2>
                <a href="{{ route('beritakita.show', $berita->id) }}" class="text-gray-500 my-4  text-center text-[11px]">
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
