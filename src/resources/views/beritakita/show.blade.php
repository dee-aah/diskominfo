<x-layouts.app>
    <div class=" container max-w-5xl mx-auto mt-20 px-4 py-8">
        {{-- Tombol kembali --}}
        <div class="flex justify-start">
            <a href="{{ url('/beranda') }}"
            class="inline-block mb-6 text-blue-500 hover:underline">
            Beranda
            </a>
            <span class="mx-2">/</span>
            <a href="{{ route('beritakita.index') }}"
            class="inline-block mb-6 text-blue-500 hover:underline">
            Berita
            </a> <span class="mx-2">/</span>
            <a href="{{ route('beritakita.index') }}"
            class="inline-block mb-6 text-blue-500 hover:underline">
            {{ $berita->judul }}
            </a>
        </div>


        {{-- Judul artikel --}}
        <h1 class="text-3xl font-bold mb-4">{{ $berita->judul }}</h1>

        {{-- Tanggal publikasi --}}
        <p class="text-gray-500 text-sm mb-6">
            Dipublikasikan pada {{ $berita->created_at->translatedFormat('d F Y') }}
        </p>

        {{-- Gambar artikel --}}
        @if ($berita->gambar)
            <div class="mb-6">
                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                     alt="{{ $berita->judul }}"
                     class="w-full max-h-[500px] object-cover rounded-lg shadow-md">
            </div>
        @endif

        {{-- Isi artikel --}}
        <div class="prose max-w-none text-justify">
            {!! nl2br(e($berita->deskripsi)) !!}
        </div>
    </div>
</x-layouts.app>

