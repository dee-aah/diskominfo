<x-layouts.app>
    <h1 class="text-2xl font-bold mb-4">Berita: {{ $kategori->nama }}</h1>

    @foreach ($beritas as $berita)
        <div class="mb-4">
            <a href="{{ route('beritakita.show', $berita->id) }}" class="text-lg font-semibold text-blue-600">
                {{ $berita->judul }}
            </a>
            <p>{{ Str::limit($berita->deskripsi, 150) }}</p>
        </div>
    @endforeach
</x-layouts.app>
